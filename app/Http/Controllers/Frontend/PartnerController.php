<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationMail;
use App\Mail\PartnerMail;
use App\Models\EmailTemplates;
use App\Models\Rating;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class PartnerController extends Controller
{
    public function becomePartner()
    {
        return view('frontend.pages.partners.become-a-partner');
    }

    public function savePartner(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'required',
            'phone_number' => 'required',
//            'cnic' => 'required|unique:users,cnic',
            'email' => 'required|email|max:255|unique:users',
        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'phone_number.required' => 'Phone Number is required.',
//            'cnic.required' => 'CNIC is required.',
            'company_name.required' => 'Company Name is required.',
            'email.required' => 'Email is required.',
        ]);
        $role = Role::find(2);

        $password = '1234567898';
        $user = User::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'role_id' => $role->id,
            'phone_number' => $request->get('phone_number'),
//            'cnic' => $request->get('cnic'),
            'user_type' => $role->name,
            'company_name' => $request->company_name,
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'password' => Hash::make($password),
        ]);
        UserRole::create([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);
        $settings = Setting::first();
        $emailTemplate = EmailTemplates::where('type', 'become-partner')->first();
        Mail::to($user->email)
            ->bcc(['muhammad.atif@solarnest.pk', 'muhammad.mohsin@solarnest.pk', 'solarnestpk@gmail.com', 'info@solarnest.pk'])
//            ->cc(['muhammad.atif@solarnest.pk', 'muhammad.mohsin@solarnest.pk', 'solarnestpk@gmail.com', 'info@solarnest.pk'])
            ->send(new PartnerMail($user, $settings, $emailTemplate));

        return redirect()->route('index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Thanks for registering with SolarNest, We will get back to you for more details.'
            ]);
    }


    public function existingPartner()
    {
        $existingPartners = User::where('user_type', 'partner')->where('status', 'verified')->orderBy('id', 'asc')->limit(6)->get();
        return view('frontend.pages.partners.existing-partners', compact('existingPartners'));
    }

    public function loadPartnerAjax(Request $request)
    {
        $output = '';
        $id = $request->id;

        $partners = User::where('id', '>', $id)->orderBy('id', 'asc')->where('user_type', 'partner')->where('status', 'verified')->limit(4)->get();
        if (!$partners->isEmpty() && ($partners->count() > 0)) {
            $parnter_id = null;
            foreach ($partners as $partner) {
                $url = url('/uploads/user_profiles/' . $partner->profile_pic);
                $parnter_id = $partner->id;
                $averageStars = Rating::where('partner_id', $partner->id)->selectRaw('SUM(overall_rating)/COUNT(partner_id) AS avg_rating')->first()->avg_rating;;
                $output .= ' <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                                <div class="partner">
                                    <div class="company_profile">
                                        <div class="company_logo">
                                            <img  src="' . $url . '">
                                        </div>
                                        <div class="company_reviews">
                                            <div class="review">
                                                <h2>' . round($averageStars, 2) . '<span>/5</span></h2>
                                            </div>
                                            <div class="review_stars">
                                                <ul>
                                                   ' . View::make('frontend.pages.partners.stars-section.stars', ['averageStars' => $averageStars]) . '
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="company_description">
                                        <p>' . \Illuminate\Support\Str::limit($partner->description, 170) . '</p>
                                    </div>

                                    <div class="company_average_rating">

                                        <div class="goto_reviews">
                                            <a class="reviews-btn fill-border-btn" href="' . route('partner.reviews', $partner->id) . '"><span>Reviews<i
                                                        class="fa fa-angle-right"></i></span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }
            $output .= '<div class="view_more col-12" id="remove-row">
                                <a  href="javascript:void(0)" class="view_more_btn fill-border-btn" id="btn-more" data-id="' . $parnter_id . '"><span>Load More<i
                                    class="fa fa-angle-right"></i></span> </a>
                        </div>';

            echo $output;
        }
    }
}
