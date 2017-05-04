<?php

namespace App\Models;

use App\Http\Controllers\AnouncementController;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','surname',
        'email', 'password', 'birth_day',
        'phone_number','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
    public function reports(){
      return  $this->hasMany(Report::class);
    }

    public function kaya(){
        return $this->belongsTo(Kaya::class);
    }



}
