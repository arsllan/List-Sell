<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'loginid',
        'password',
        'phone',
        'gender',
        'verify_status',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function dealerdata() {
        return $this->belongsTo(Dealers::class, 'id','user_id');
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function favlistingCount()
    {
        return \App\Models\Favorite::where('user_id','=',$this->id)->count();
    }
}
















