<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Product extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'id', 'product_id', 'sku', 'name', 'category', 'brand', 'type', 'costing_method', 'drop_ship_mode', 'default_location', 'length', 'width', 'height', 'weight', 'uom', 'barcode', 'tags', 'status', 'last_modified_on', 'sellable', 'all_data'    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'id', 'product_id', 'sku', 'name', 'category', 'brand', 'type', 'costing_method', 'drop_ship_mode', 'default_location', 'length', 'width', 'height', 'weight', 'uom', 'barcode', 'tags', 'status', 'last_modified_on', 'sellable', 'all_data'    ];
}
