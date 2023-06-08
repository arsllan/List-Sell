<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ListingReview extends Model
{
    protected $table = 'listing_reviews';
    public function reviews() {
        return $this->belongsTo(Listing::class, 'listing_id','id');
    }
}