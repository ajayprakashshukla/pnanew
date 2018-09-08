<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Debit_credit extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'email', 'wallet_category', 'wallet_id','amount', 'dates','type', 'discription', 'updated_at', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'email', 'wallet_category','wallet_id', 'amount','dates', 'type', 'discription', 'updated_at', 'created_at'
    ];
}
