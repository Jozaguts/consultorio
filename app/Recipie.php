<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipie extends Model
{
    use SoftDeletes;
    protected $table = 'recipies';

    protected $fillable=[        
        'consultation_id', 'invoice', 'observations'
    ];
}
