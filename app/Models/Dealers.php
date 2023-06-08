<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Dealers extends Model
{
    protected $table = 'dealers';
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function citydata() {
        return $this->belongsTo(Cities::class, 'city');
    }
    public function statesdata() {
        return $this->belongsTo(State::class, 'region');
    }
    public function listing() {
        return $this->belongsTo(Listing::class, 'user_id');
    }
    public function reviews()
    {
        return $this->hasMany(DealersReview::class, 'dealer_id', 'id');
    }
}
