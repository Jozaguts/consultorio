<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    protected $table = 'consultorios';

    protected $fillable = [
        'name', 'address', 'phone','responsable','logo','licence', 'web', 'twitter', 'facebook', 'instagram'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
