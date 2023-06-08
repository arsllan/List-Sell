<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ListingInquiry extends Model
{
    protected $table = 'listing_inquiry';
    public function list() {
        return $this->belongsTo(Listing::class, 'listing_id','id')->with('model','model_sub','body_type');
    }
}