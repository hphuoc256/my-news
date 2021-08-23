<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'title',
        'description',
        'image',
        'status', 
        'hot',
        'views',
        'meta_keyword',
        'meta_description'
    ];

    public $timestamp = false;

    // public function new_blogs(){
    //     return $this->hasMany(New_Blog::class,'new_id');
    // }
}
