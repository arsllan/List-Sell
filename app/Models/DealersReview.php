<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DealersReview extends Model
{
    protected $table = 'dealer_reviews';
    public function reviews() {
        return $this->belongsTo(Dealers::class, 'dealer_id','id');
    }
}