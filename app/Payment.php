<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $table = 'payments';
    protected$fillable = [ 'cash_out_id', 'date', 'amount', 'payment_method_id', 'consulting_room_id'];
}
