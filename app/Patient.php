<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;
    protected $table = 'patients';

    protected $fillable = [
        'first_name',
        'last_name',
        'second_last_name',
        'age',
        'height',
        'address',
        'phone',
        'contact',
        'contact_phone',
        'consulting_room_id'
    ];
}
