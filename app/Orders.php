<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'request';

    protected $fillable = [
        'users_id', 'inventories_id', 'status_id', 'date', 'date_init', 'date_end'
    ];

    public function user()
    {
        return $this->belongsTo( User::class, 'users_id');
    }

    public function book()
    {
        return $this->belongsTo( Inventory::class,'inventories_id');
    }

    public function status()
    {
        return$this->belongsTo(Book_Status::class,'status_id');
    }
}
