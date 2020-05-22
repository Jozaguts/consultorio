<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecipieDetails extends Model
{
    use SoftDeletes;
    protected $table= 'recipies_details';

    protected $fillable = [
        'recipie_id', 'description', 'observations'
    ];
}
