<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'alias',
        'price',
        'desc',
        'img',
        'new',
        'recommend',
        'hit',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount()
    {
        return $this->price * $this->pivot->count;
    }

    public function scopeNew($query)
    {
        return $query->where('new', 1);
    }

    public function scopeRecommend($query)
    {
        return $query->where('recommend', 1);
    }

    public function scopeHit($query)
    {
        return $query->where('hit', 1);
    }

    public function isNew()
    {
        return $this->new === 1;
    }

    public function isRecommend()
    {
        return $this->recommend === 1;
    }

    public function isHit()
    {
        return $this->hit === 1;
    }

    public function isLabels()
    {
        return $this->isHit() || $this->isRecommend() || $this->isNew();
    }
}
