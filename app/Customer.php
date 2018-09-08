<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'customer_id', 'name', 'currency', 'payment_term', 'discount', 'tax_rule', 'carrier', 'sales_representative', 'location', 'comments', 'account_receivable', 'revenue_account', 'price_tier', 'tax_number', 'additionalAttribute1', 'additionalAttribute2', 'additionalAttribute3', 'additionalAttribute4', 'additionalAttribute5', 'additionalAttribute6', 'additionalAttribute7', 'additionalAttribute8', 'additionalAttribute9', 'additionalAttribute10', 'attribute_set', 'tags', 'status', 'last_modified_on', 'credit_limit'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'id', 'customer_id', 'name', 'currency', 'payment_term', 'discount', 'tax_rule', 'carrier', 'sales_representative', 'location', 'comments', 'account_receivable', 'revenue_account', 'price_tier', 'tax_number', 'additionalAttribute1', 'additionalAttribute2', 'additionalAttribute3', 'additionalAttribute4', 'additionalAttribute5', 'additionalAttribute6', 'additionalAttribute7', 'additionalAttribute8', 'additionalAttribute9', 'additionalAttribute10', 'attribute_set', 'tags', 'status', 'last_modified_on', 'credit_limit'
    ];
}
