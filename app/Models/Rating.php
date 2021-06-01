<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "ratings";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('user_id', 'id');
    }

    public function partner()
    {
        return $this->belongsTo('partner_id', 'id');
    }

    public function offer()
    {
        return $this->belongsTo('offer_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo('order_id', 'id');
    }
}
