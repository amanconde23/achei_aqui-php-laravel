<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRating extends Model
{
    protected $fillable = [
        'user_id', 'avaliado', 'rating', 'comment',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
