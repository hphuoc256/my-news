<?php
namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Service;

class ProductRepository extends BaseRepository implements ProductInterface
{
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    //CLient
    public function getdetailProduct($attributes)
    {
        try {
            $response =  $this->model->where('slug', $attributes)->get()->toArray();

            return $response;
        }
        catch (Exception $e) {
            Log::error("#Detail Product - ERROR" .$e);
        }
    }

    public function getProjectDone() {
        $service = buildTree(Service::where('status', 1)->get()->toArray());
        return $service[6];
    }

    //Admin
    public function getList() {
        $result = Product::with('category')->with('services')->get()->toArray();
        return $result;
    }

    public function getService() {
        $result = Service::where('parent_id', 3)->get()->toArray();
        return $result;
    }

    public function getCategory() {
        $result = Category::where('parent_id',0)->get();
        return $result;
    }

}