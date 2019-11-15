<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'genres';

    protected $fillable = [
        'name'
    ];
}
