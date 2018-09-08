<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class facility extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'name', 'min_amount', 'max_amount', 'facility_categories', 'description', 'interest_rate', 'maximum_tenor', 'payment_schedule', 'monthly_payment_date', 'quarterly_payment_date', 'annualy_payment_date', 'monthly_interest_payment_date', 'processing_fee', 'insurance_fee', 'management_fee', 'status', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'name', 'min_amount', 'max_amount', 'facility_categories', 'description', 'interest_rate', 'maximum_tenor', 'payment_schedule', 'monthly_payment_date', 'quarterly_payment_date', 'annualy_payment_date', 'monthly_interest_payment_date', 'processing_fee', 'insurance_fee', 'management_fee', 'status', 'created_at', 'updated_at'   ];
}
