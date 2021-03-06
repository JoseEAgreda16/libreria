<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = [
        'name', 'surname'
    ];

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    //Scope

    public function scopeAuthor($query, $author )
    {
        if($author)
            return $query->where('name', 'LIKE', "%$author%");
    }
}
