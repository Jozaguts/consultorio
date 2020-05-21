<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;
    protected $table = 'doctors';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'consulting_room_id', 'specialty_id','phone' ,'mobile_phone', 'whatsapp', 'address', 'identification_card', 'birth_date', 'studies', 'observations'
    ];

    protected $hidden = ['remember_token'];
       
}
