<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecentProduct extends Model
{
    
    protected $table = 'recent_products';
    protected $fillable = [
        'name', 'image', 'price',
    ];

    public function category(){

        return $this->belongsTo(Categorys::class, 'category_id');

    }
}
