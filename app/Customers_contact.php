<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customers_contact extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'id', 'contact_id', 'name', 'job_title', 'phone', 'mobile_phone', 'fax', 'email', 'website', 'defaults', 'comment', 'include_in_email', 'customer_id'    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
  'id', 'contact_id', 'name', 'job_title', 'phone', 'mobile_phone', 'fax', 'email', 'website', 'defaults', 'comment', 'include_in_email', 'customer_id'    ];
}
