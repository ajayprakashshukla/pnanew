<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Wallet extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'xls_id','creation_date', 'wallet_name', 'wallet_type', 'company_email', 'sharp_id', 'monthly_payment', 'quarterly_payment', 'annual_payment', 'wallet_balance', 'updated_at', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'xls_id', 'creation_date','wallet_name', 'wallet_type', 'company_email', 'sharp_id', 'monthly_payment', 'quarterly_payment', 'annual_payment', 'wallet_balance', 'updated_at', 'created_at'
    ];
}
