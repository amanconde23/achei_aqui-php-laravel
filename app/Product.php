<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'category', 'image', 'statusProduto',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
