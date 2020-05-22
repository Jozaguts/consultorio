<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentDetail extends Model
{
    use SoftDeletes;
    protected $table = 'payment_details';
    protected $field = ['payment_id', 'consultation_id', 'amount'];
    
}
