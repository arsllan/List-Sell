<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ListingCallBack extends Model
{
    protected $table = 'listing_callbackrequest';
    public function list() {
        return $this->belongsTo(Listing::class, 'listing_id','id')->with('model','model_sub','body_type');
    }
}