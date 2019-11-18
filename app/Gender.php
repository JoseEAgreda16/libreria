<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{

    protected $table = 'genres';

    protected $fillable = [
        'name'
    ];

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
