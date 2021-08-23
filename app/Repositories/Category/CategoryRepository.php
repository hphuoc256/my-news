<?php
namespace App\Repositories\Category;

use App\Repositories\BaseRepository;
use App\Models\Category;


class CategoryRepository extends BaseRepository implements CategoryInterface
{
    public function getModel() {
        return \App\Models\Category::class;
    }

    public function getParentId() {
        $result = Category::where('parent_id',0)->get();
        return $result;
    }


}