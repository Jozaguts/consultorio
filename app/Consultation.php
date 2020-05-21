<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{
    use SoftDeletes;

    protected $table = 'consultations';

    protected $fillable = [
        'consulting_room_id', 'patient_id', 'date', 'doctor_id', 'problem', 'observations'
    ];
}



