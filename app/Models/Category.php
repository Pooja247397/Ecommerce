<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

     public function products()
    {
        return $this->hasOne(Product::class,'category_id');
        // note: we can also inlcude Mobile model like: 'App\Mobile'
    }
}
