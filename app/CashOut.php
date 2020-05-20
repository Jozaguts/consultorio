<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashOut extends Model
{
    use SoftDeletes;
    
    protected $table = 'cash_outs';

    protected $fillable = ['user_id','date','amount','cash_out_date','consulting_room_id'];

    
}
