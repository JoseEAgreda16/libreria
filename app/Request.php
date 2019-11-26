<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'usersbook';

    protected $fillable = [
        'users_id', 'book_id', 'status_id', 'date'
    ];

    public function user()
    {
        return $this->belongsTo( User::class, 'users_id');
    }

    public function book()
    {
        return $this->belongsTo( Book::class,'book_id');
    }

    public function status()
    {
        return$this->belongsTo(Status::class,'status_id');
    }
}
