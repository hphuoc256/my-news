<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name', 
        'slug',
        'status',
        'category_id',
        'image',
        'user_id',
        'title',
        'description',
        'hot',
        'meta_keyword',
        'meta_description',
        'service_id',
        'views'
    ];

    public $timestamp = false;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function services()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
}
