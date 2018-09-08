<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id', 'company_id', 'name', 'middle_name', 'lastname', 'email', 'secondary_email', 'mobile_no', 'mobile_no_country', 'office_extension', 'office_extension_country', 'next_of_kin', 'relationship_with_next_of_kin', 'next_of_kin_phone_number', 'next_of_kin_phone_number_country', 'address', 'state', 'country', 'password', 'password_match', 'role', 'status', 'approved_by', 'img', 'remember_token', 'identity_proof', 'sharp_id', 'proposed_monthly_income', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'company_id', 'name', 'middle_name', 'lastname', 'email', 'secondary_email', 'mobile_no', 'mobile_no_country', 'office_extension', 'office_extension_country', 'next_of_kin', 'relationship_with_next_of_kin', 'next_of_kin_phone_number', 'next_of_kin_phone_number_country', 'address', 'state', 'country', 'password', 'password_match', 'role', 'status', 'approved_by', 'img', 'remember_token', 'identity_proof', 'sharp_id', 'proposed_monthly_income', 'created_at', 'updated_at'
    ];
}