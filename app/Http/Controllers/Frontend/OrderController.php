<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Mail\ConfirmationMail;
use App\Mail\VerifyMail;
use App\Models\EmailTemplates;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserRole;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|max:255',
        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'phone_number.required' => 'Phone Number is required.',
            'email.required' => 'Email is required.',
        ]);
        $role = Role::find(3);

        $password = '1234567898';

        $checkUser = User::where('email', $request->email)->first();
        if (!is_null($checkUser)) {
            $user = $checkUser;
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->phone_number = $request->get('phone_number');
            $user->address = $request->get('address');
            $user->save();
        } else {
            $user = User::create([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'role_id' => $role->id,
                'phone_number' => $request->get('phone_number'),
                'user_type' => $role->name,
                'address' => $request->get('address'),
                'email' => $request->get('email'),
                'password' => Hash::make($password),
            ]);
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $role->id
            ]);
        }
        $offer = Offer::find($request->offer_id);
        $partner = User::where('id', $request->partner_id)->first();
        $proposal_number = 'LHR' . date('m') . '' . date('Y') . '-' . $partner->id . '-' . $offer->id . '';

        ini_set('max_execution_time', 300); // 5 minutes
        $order = new Order();
        $order->user_id = $user->id;
        $order->partner_id = $request->partner_id;
        $order->offer_id = $request->offer_id;
        $order->proposal_number = $proposal_number;
        $order->status = 'pending';
        $order->save();
        $proposal_number = 'LHR' . date('m') . '' . date('Y') . '-' . $partner->id . '-' . $offer->id . '' . $order->id . '';
        $order->proposal_number = $proposal_number;
        $order->save();

        $settings = Setting::first();

        $filename = "solarnest.pdf";
        $customPaper = array(0, 0, 1500.00, 800.80);
        $pdf = PDF::loadView('frontend.pages.comparison.email', compact('user', 'order', 'offer', 'settings', 'partner'))->setPaper($customPaper, 'landscape');;
        Storage::put('public/uploads/proposals/' . $order->id . '/' . $filename, $pdf->output());
        $emailTemplate = EmailTemplates::where('type', 'order-confirmation')->first();
        Mail::to($user->email)
//            ->cc(['muhammad.atif@solarnest.pk', 'muhammad.mohsin@solarnest.pk', 'solarnestpk@gmail.com', 'info@solarnest.pk'])
//            ->bcc(['muhammad.atif@solarnest.pk', 'muhammad.mohsin@solarnest.pk', 'solarnestpk@gmail.com', 'info@solarnest.pk'])
            ->send(new VerifyMail($user, $order, $offer, $settings, $partner, $emailTemplate));

        return redirect()->route('thankyou')->with(['message' => 'Your selected proposal has been sent to your email address with all
                                the
                                details.
                                Kindly check your spam folder if you do not receive the email in
                                inbox.']);
//            ->with([
//                'flash_status' => 'success',
//                'flash_message' => 'Thanks for using SolarNest. Your proposal has been sent to your email. Please check the spam folder if you have not received the email.'
//            ]);
    }

    public function updateOrderStatus($id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);

        if ($order->status == 'confirmed') {
            return redirect()->route('index')
                ->with([
                    'flash_status' => 'success',
                    'flash_message' => 'You have already confirmed your Order.'
                ]);
        }

        return view('frontend.pages.customer.index', compact('id', 'user'));
    }

    public function customerOrderConfirmation(Request $request)
    {
        $user = User::find($request->user_id);
        $this->validate($request, [
            'cnic' => 'required',
        ], [
            'cnic.required' => 'CNIC is required.',
        ]);
        $order = Order::find($request->order_id);
        $order->status = 'confirmed';
        $order->save();


        $user->cnic = $request->cnic;
        $user->save();

        $offer = Offer::find($order->offer_id);
        $settings = Setting::first();
        $emailTemplate = EmailTemplates::where('type', 'partner')->first();
        $partner = User::where('id', $order->partner_id)->first();

        Mail::to($partner->email)
            ->bcc(['muhammad.atif@solarnest.pk', 'muhammad.mohsin@solarnest.pk', 'solarnestpk@gmail.com', 'info@solarnest.pk'])
//            ->cc(['muhammad.atif@solarnest.pk', 'muhammad.mohsin@solarnest.pk', 'solarnestpk@gmail.com', 'info@solarnest.pk'])
            ->send(new ConfirmationMail($user, $order, $offer, $settings, $partner, $emailTemplate));


        return redirect()->route('thankyou')->with(['message' => 'Thanks for the confirmation. Our Installer will contact you on provided phone number in next 3-4 days for further process and to setup a site visit.']);
//        return redirect()->route('index')
//            ->with([
//                'flash_status' => 'success',
//                'flash_message' => 'Your Offer Has Been Confirmed Successfully.'
//            ]);
    }
}
