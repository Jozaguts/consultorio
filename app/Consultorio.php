<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Consultorio extends Model
{
    use SoftDeletes;
    protected $table = 'consultorios';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'address', 'phone','responsable','logo','licence', 'web', 'twitter', 'facebook', 'instagram'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
