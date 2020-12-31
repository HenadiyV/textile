<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model //Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','firstName',
'lastName',
'info_user',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_address() {
        return $this->hasMany('App\Models\TextileUserAddress');
    }

    public function user_phone() {
        return $this->hasMany('App\Models\TextileUserPhone');
    }

    public function user_post_office() {
        return $this->hasMany('App\Models\TextileUserPostOffice');
    }
    public function user_additional() {
        return $this->hasMany('App\Models\TextileUserAdditional');
    }
    public function user_setting() {
        return $this->hasMany('App\Models\TextileUserSetting');
    }
    public function roles() {
        return $this->belongsToMany('App\Models\Role');
    }
}
