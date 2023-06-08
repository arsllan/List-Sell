<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AutoModels extends Model
{
    protected $table = 'models';
    public function brand() {
        return $this->belongsTo(Brands::class, 'brand_id');
    }
}
