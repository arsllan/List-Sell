<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class State extends Model
{
    protected $table = 'states';
    public function listing()
    {
        return $this->hasMany(Listing::class, 'id', 'location');
    }
}
