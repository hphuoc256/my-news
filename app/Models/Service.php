<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'name',
        'parent_id',
        'title',
        'description',
        'status',
        'meta_keyword',
        'meta_description',
        'price',
        'sell',
        'image',
        'slug'
    ];

    public $timestamp = false;

    public function parent()
    {
        return $this->belongsTo(Service::class,'parent_id')->where('parent_id',0);
    }

    public function children(){
        return $this->hasMany(Service::class,'parent_id');
    }

    public function images(){
        return $this->hasMany(Image::class,'service_id');
    }

    public function products(){
        return $this->hasMany(Product::class,'service_id');
    }
}
