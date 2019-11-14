<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'lib.authors';

    protected $fillable = [
        'name'
    ];
}
