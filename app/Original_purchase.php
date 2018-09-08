<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Original_purchase extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
'id', 'invoice_no', 'serial_no', 'dates', 'files', 'created_at', 'updated_at'        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'id', 'invoice_no', 'serial_no', 'dates', 'files', 'created_at', 'updated_at' ];
}
