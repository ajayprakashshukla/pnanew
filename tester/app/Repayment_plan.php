<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Repayment_plan extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 's_no', 'date', 'loan_id', 'user_id', 'cycle', 'amount', 'interest', 'form_status', 'approvel_status', 'updated_at', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
     'id', 's_no', 'date', 'cycle','loan_id', 'user_id',  'amount', 'interest', 'form_status', 'approvel_status', 'updated_at', 'created_at'
    ];
}
