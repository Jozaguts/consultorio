<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    protected $table = 'appointments';
    protected $fillable = [ 'date', 'patient_id','doctor_id', 'consulting_room_id'];
}
