<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'alias', 'desc', 'img'];

    public function products()
    {
        return $this->hasMany(Product::class)->orderBy('id', 'desc');
    }
}
