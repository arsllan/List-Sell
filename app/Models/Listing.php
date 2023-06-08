<?php

namespace App\Models;
use App\Models\Brands;
use Illuminate\Database\Eloquent\Model;
class Listing extends Model
{
    protected $table = 'listings';
    public function user() {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
    public function category() {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function auto_details() {
        return $this->belongsTo(AutoDetails::class, 'auto_details_id');
    }
    public function model() {
        return $this->belongsTo(AutoModels::class, 'model_id')->with('brand');
    }
    public function model_sub() {
        return $this->belongsTo(AutoModels::class, 'equipment_id');
    }
    public function location() {
        return $this->belongsTo(State::class, 'location');
    }
    public function equipment() {
        return $this->belongsTo(Equipments::class, 'equipment_id');
    }
    public function body_type() {
        return $this->belongsTo(BodyTypes::class, 'body_type_id');
    }
    public function media()
    {
        return $this->hasMany(ListingMedia::class, 'id', 'listing_id');
    }
    public function reviews()
    {
        return $this->hasMany(ListingReview::class, 'listing_id', 'id');
    }
    public function favorites()
    {
        return $this->belongsToMany(Favorite::class);
    }
}
