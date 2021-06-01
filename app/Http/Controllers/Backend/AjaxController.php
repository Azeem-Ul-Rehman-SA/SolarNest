<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\RatingMail;
use App\Mail\VerifyMail;
use App\Models\Area;
use App\Models\EmailTemplates;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
use Illuminate\Support\Facades\Validator;

class AjaxController extends Controller
{
    public function cityArea(Request $request)
    {
        $response = array('status' => '', 'message' => "", 'data' => array());

        $validator = Validator::make($request->all(), [
            'city_id' => 'required|exists:cities,id'
        ], [
            'city_id.required' => "City is Required.",
            'city_id.exists' => "Invalid City Selected."
        ]);

        if (!$validator->fails()) {
            $area = Area::where('city_id', $request->city_id)->get();

            $response['status'] = 'success';
            $response['data'] = [
                'area' => $area,
            ];
        } else {
            $response['status'] = 'error';
            $response['message'] = "Validation Errors.";
            $response['data'] = $validator->errors()->toArray();
        }

        return $response;
    }

    public function updateOrderStatus(Request $request)
    {
        $response = array('status' => '', 'message' => "", 'data' => array());

        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id'
        ], [
            'order_id.required' => "Order Id is Required.",
            'order_id.exists' => "Invalid Order Id Selected."
        ]);

        if (!$validator->fails()) {
            $order = Order::where('id', $request->get('order_id'))->update([
                'status' => $request->get('status'),
            ]);


            $order = Order::find($request->order_id);
            $user = User::where('id', $order->user_id)->first();
            $offer = User::where('id', $order->offer_id)->first();
            $partner = User::where('id', $order->partner_id)->first();


            $settings = Setting::first();
            $emailTemplate = EmailTemplates::where('type', 'feedback')->first();
            if ($request->get('status') == 'completed') {
                Mail::to($user->email)
                    ->bcc(['muhammad.atif@solarnest.pk', 'muhammad.mohsin@solarnest.pk', 'solarnestpk@gmail.com', 'info@solarnest.pk'])
//                    ->cc(['muhammad.atif@solarnest.pk', 'muhammad.mohsin@solarnest.pk', 'solarnestpk@gmail.com', 'info@solarnest.pk'])
                    ->send(new RatingMail($user, $order, $offer, $settings, $partner, $emailTemplate));

            }


            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
            $response['message'] = "Validation Errors.";
            $response['data'] = $validator->errors()->toArray();
        }

        return $response;

    }


}
