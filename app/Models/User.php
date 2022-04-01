<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'apellidos',
        'email',
        'password',
    ];

    public function adminlte_image(){
        return Auth::user()->profile_photo_url;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //relacion uno a uno
    public function profile(){
        return $this->hasOne('App\Models\Profile');
    }

    //relación uno a muchos
    public function courses_dictated(){
        return $this->hasMany('App\Models\Course');
    }

    //Relacion muchos a muchos
    public function courses_enrolled(){
        return $this->belongsToMany('App\Models\Course');
    }

    //Relacion uno a muchos en reviews
    public function reviews(){
        return $this->hasMany('App\Models\Reviews');
    }

    //relacion muchos a mucho lecciones
    public function lessons(){
        return $this->belongsToMany('App\Models\Lesson');
    }
    
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    public function reactions(){
        return $this->hasMany('App\Models\Reaction');
    }

    //Relacion uno a muchos en reviews
    public function results(){
        return $this->hasMany('App\Models\Result');
    }
}
