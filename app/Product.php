<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'type','description','price','image'];

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
    public function post()
    {
        return $this->belongsTo('App\Commande', 'commande_id');
    }
}
