<?php

namespace App;

use Carbon\Carbon;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use SoftDeletes;
    use Notifiable,HasRoles,HasApiTokens,HasMediaTrait;
    
    protected $softDelete = true; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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


    protected $appends = ['image_url'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d-M-Y');
    }

    public function getImageUrlAttribute(){
        return $this->getFirstMediaUrl('picture');
    }

}
