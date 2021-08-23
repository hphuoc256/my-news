<?php
namespace App\Repositories\Image;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Image;

class ImageRepository extends BaseRepository implements ImageInterface
{
    public function getModel() {
        return \App\Models\Image::class;
    }
}