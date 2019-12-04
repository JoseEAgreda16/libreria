<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';

    protected $fillable = [
        'book_id', 'status_id'

    ];



    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
