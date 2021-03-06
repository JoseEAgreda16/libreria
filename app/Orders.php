<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'users_id', 'inventories_id', 'status_id', 'date', 'date_init', 'date_end'
    ];

    //Relacion

    public function user()
    {
        return $this->belongsTo( User::class, 'users_id');
    }

    public function inventory()
    {
        return $this->belongsTo( Inventory::class,'inventories_id');
    }

    public function status()
    {
        return$this->belongsTo(Order_Status::class,'status_id');
    }

    //Scope

    public function scopeStatus($query, $status)
    {
        if($status)
        {
            return $query->where('status_id', $status);
        }
    }

}
