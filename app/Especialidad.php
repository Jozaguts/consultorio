<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use SoftDeletes;
    protected $table = 'specialties';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'consulting_room_id'
    ];

}
