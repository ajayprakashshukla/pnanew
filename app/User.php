<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'secondary_email', 'mobile_no','show_password', 'office_extension', 'next_of_kin', 'relationship_with_next_of_kin', 'next_of_kin_phone_number', 'address', 'city_town', 'country', 'role','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'name', 'email', 'secondary_email', 'mobile_no','show_password', 'office_extension', 'next_of_kin', 'relationship_with_next_of_kin', 'next_of_kin_phone_number', 'address', 'city_town', 'country','role', 'password'
    ];
}
