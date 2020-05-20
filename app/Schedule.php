<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    protected $table = 'schedules';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'doctor_id', 'consulting_room_id', 'd', 'l','m', 'x','j', 'v', 's'
    ];
    protected $hidden = [
        'remember_token'
    ];
}