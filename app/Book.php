<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'lib.books';

    protected $fillable = [
        'title', 'author_id', 'date_public', 'genres_id', 'quantity',
    ];
}
