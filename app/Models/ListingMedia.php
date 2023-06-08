<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ListingMedia extends Model
{
    protected $table = 'listings_media';
    public function media() {
        return $this->belongsTo(ListingMedia::class, 'id','listing_id');
    }
}