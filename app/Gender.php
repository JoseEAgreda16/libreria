<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'lib.genders';

    protected $fillable = [
        'name'
    ];
}
