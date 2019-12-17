<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title', 'author_id', 'date_public', 'genres_id', 'quantity',
    ];

    // Relaciones

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'genres_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    //Scope

    public function scopeTitle($query, $title )
    {
        if($title)
        {
            return $query->where('title', 'LIKE', "%$title%");
        }
    }

    public function scopeGender($query, $gender )
    {
        if($gender)
        {
            return $query->where('genres_id', $gender);
        }
    }


}
