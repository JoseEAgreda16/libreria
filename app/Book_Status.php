<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_Status extends Model
{
    protected $table = 'book_status';

    protected $fillable = [
      'name'
    ];
}
