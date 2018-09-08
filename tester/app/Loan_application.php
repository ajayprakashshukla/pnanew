<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Loan_application extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'user_id', 'facility_id', 'created_at', 'updated_at', 'tenor', 'amount_requested', 'tenors', 'payment_schedule', 'quarterly_payment', 'monthly_payment','annually_payment','payslip_1', 'payslip_2', 'account_statment', 'bank_verification_no','status','approvel_status','direct_debit_auth_print'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'id', 'user_id', 'facility_id', 'created_at', 'updated_at', 'tenor', 'amount_requested', 'tenors', 'payment_schedule','quarterly_payment', 'monthly_payment','annually_payment', 'payslip_1', 'payslip_2', 'account_statment', 'bank_verification_no','status','approvel_status','direct_debit_auth_print'
    ];
}








