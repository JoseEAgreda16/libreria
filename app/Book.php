<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title', 'author_id', 'date_public', 'genres_id', 'quantity',
    ];

    public function gender()
    {
        return $this->hasOne(Gender::class, 'genres_id');
    }

    public function author()
    {
        return $this->hasOne(Author::class);
    }
}
