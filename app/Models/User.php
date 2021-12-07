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
     * @var string[]
     */

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'nik',
        'address',
        'province',
        'selfie_with_ktp',
        'password',
    ];

    protected $guarded = [
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dayTripPlan(){
        return $this->hasMany(DayTripPlan::class, 'user_id');
    }

    public static function getAllUserDataById($id) {
        return User::with('daytripPlan.dayTripImages')->get();
    }
}
