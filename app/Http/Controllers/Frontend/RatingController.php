<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\Rating;
use App\Models\User;
use App\Traits\GeneralHelperTrait;
use Illuminate\Http\Request;


class RatingController extends Controller
{
    use GeneralHelperTrait;

    public function index($id)
    {
        $partner = User::where('id', $id)->where('user_type', 'partner')->where('status', 'verified')->first();
        $ratings = Rating::where('partner_id', $id)->orderBy('id', 'asc')->limit(6)->get();
        $averageStars = $this->averageRating($id);
        $qualityOfWork = Rating::where('partner_id', $partner->id)->selectRaw('SUM(quality_of_work)/COUNT(partner_id) AS avg_rating')->first()->avg_rating;;
        $professionalism = Rating::where('partner_id', $partner->id)->selectRaw('SUM(professionalism)/COUNT(partner_id) AS avg_rating')->first()->avg_rating;;
        $qualityOfMaterial = Rating::where('partner_id', $partner->id)->selectRaw('SUM(quality_of_material)/COUNT(partner_id) AS avg_rating')->first()->avg_rating;;
        $onTimeDelivery = Rating::where('partner_id', $partner->id)->selectRaw('SUM(on_time_delivery)/COUNT(partner_id) AS avg_rating')->first()->avg_rating;;
        $overallExperience = Rating::where('partner_id', $partner->id)->selectRaw('SUM(overall_experience)/COUNT(partner_id) AS avg_rating')->first()->avg_rating;

        return view('frontend.pages.partners.review', compact('partner', 'ratings', 'averageStars', 'qualityOfMaterial', 'professionalism', 'qualityOfWork', 'onTimeDelivery', 'overallExperience'));
    }

    public function rating($id)
    {
        $order = Order::where('id', $id)->first();
        $rating = Rating::where('order_id',$order->id)->first();
        if (!is_null($rating)) {
            return redirect()->route('index')
                ->with([
                    'flash_status' => 'success',
                    'flash_message' => 'You have already Review this Order.'
                ]);
        }
        return view('frontend.pages.partners.rating', compact('id', 'order'));
    }

    public function ratingStore(Request $request)
    {

        $this->validate($request, [
            'quality_of_work' => 'required',
            'professionalism' => 'required',
            'quality_of_material' => 'required',
            'on_time_delivery' => 'required',
            'overall_experience' => 'required',
            'comment' => 'required',
        ], [
            'quality_of_work.required' => 'Quality of Work is required.',
            'professionalism.required' => 'Professionalism is required.',
            'quality_of_material.required' => 'Quality of Material is required.',
            'on_time_delivery.required' => 'On time Delivery is required.',
            'overall_experience.required' => 'Overall Experience is required.',
            'comment.required' => 'Comment is required.',
        ]);

        $overRating = (int)$request->quality_of_work + (int)$request->professionalism + (int)$request->quality_of_material + (int)$request->on_time_delivery + (int)$request->overall_experience;
        $overRating = $overRating / 5;
        $order = Order::where('id', $request->order_id)->first();
        $rating = new Rating();
        $rating->user_id = $order->user_id;
        $rating->partner_id = $order->partner_id;
        $rating->offer_id = $order->offer_id;
        $rating->order_id = $order->id;
        $rating->name = $order->user->fullName();
        $rating->quality_of_work = $request->quality_of_work;
        $rating->professionalism = $request->professionalism;
        $rating->quality_of_material = $request->quality_of_material;
        $rating->on_time_delivery = $request->on_time_delivery;
        $rating->overall_experience = $request->overall_experience;
        $rating->overall_rating = $overRating;
        $rating->comments = $request->comment;
        $rating->save();
        return redirect()->route('index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Your Review has Been Saved Successfully.'
            ]);
    }


    public function loadReviewsAjax(Request $request)
    {
        $output = '';
        $id = $request->id;
        $partner_id = $request->id;

        $ratings = Rating::where('id', '>', $id)->where('partner_id', $partner_id)->orderBy('id', 'asc')->limit(6)->get();
        if (!$ratings->isEmpty() && ($ratings->count() > 0)) {
            $id = null;
            foreach ($ratings as $rating) {
                $id = $rating->id;

                $output .= '  <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                                <div class="review_item">
                                    <div class="review_author">
                                        <div class="review_auth_dp">
                                            <img>
                                        </div>
                                         <div class="review_auth_info">
                                            <div class="name">
                                                <h6>' . ucfirst($rating->name) . '</h6>
                                            </div>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <span>(' . $rating->overall_rating . ')</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="review-text">
                                        <p>' . $rating->comments . '</p>
                                    </div>
                                </div>
                            </div>';

            }
            $output .= '<div class="view_more col-12" id="remove-row">
                                <a  href="javascript:void(0)" class="view_more_btn fill-border-btn" id="btn-more" data-id="' . $id . '" data-partner-id="' . $partner_id . '"><span>Load More<i
                                    class="fa fa-angle-right"></i></span> </a>
                                 </div>';

            echo $output;
        }
    }
}
