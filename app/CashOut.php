<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashOut extends Model
{
    protected $table = 'cash_outs';

    protected $fillable = ['user_id','date','amount','cash_out_date','consulting_room_id'];

    
}
