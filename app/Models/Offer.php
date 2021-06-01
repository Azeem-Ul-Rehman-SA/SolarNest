<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "offers";
    protected $guarded = [];

    public function partner()
    {
        return $this->belongsTo(User::class, 'partner_id', 'id');
    }
}
