<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Defective_return extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
'id', 'customer_id', 'dates', 'serial_no', 'shipping_carrier', 'shipping_tracking','return_location', 'notes_explanation', 'updated_at', 'created_at'       ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'id', 'customer_id', 'dates', 'serial_no', 'shipping_carrier', 'shipping_tracking','return_location', 'notes_explanation', 'updated_at', 'created_at' ];
}
