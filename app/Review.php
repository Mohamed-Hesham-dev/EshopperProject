<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user(){

        return $this->belongsTo(User::class, 'user_id');

    }
    public function product(){

        return $this->belongsTo(RecentProduct::class, 'product_id');

    }
}
