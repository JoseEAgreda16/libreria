<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'usersbook';

    protected $fillable = [
        'users_id', 'book_id', 'status_id', 'date'
    ];
}
