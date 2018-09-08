<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Revenue extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'revenue', 'revenue_per', 'wallet_id', 'loan_applications_id', 'description', 'updated_at', 'created_at','debit_credits_id','dates'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'revenue', 'revenue_per', 'wallet_id', 'loan_applications_id', 'description', 'updated_at', 'created_at','debit_credits_id','dates'
    ];
}
