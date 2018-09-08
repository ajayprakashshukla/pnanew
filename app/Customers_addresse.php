<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customers_addresse extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'customer_id', 'address_id', 'line1', 'line2', 'city', 'state', 'postcode', 'country', 'type', 'default_for_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'customer_id', 'address_id', 'line1', 'line2', 'city', 'state', 'postcode', 'country', 'type', 'default_for_type'
    ];
}
