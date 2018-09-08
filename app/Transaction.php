<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Transaction extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','transactions_types', 'serial_no', 'dates', 'files', 'customer_id', 'shipping_carrier', 'shipping_tracking','from_location','to_location', 'return_location', 'notes_explanation', 'location', 'updated_at', 'created_at' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'id','transactions_types' ,'serial_no', 'dates', 'files', 'customer_id', 'shipping_carrier', 'shipping_tracking','from_location','to_location', 'return_location', 'notes_explanation', 'location', 'updated_at', 'created_at'];
}
