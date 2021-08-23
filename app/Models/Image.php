<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'name',
        'url',
        'product_id',
        'news_id',
        'service_id',
        'status',
    ];

    public $timestamp = false;

    public function services()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
}
