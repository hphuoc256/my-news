<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductInterface;

class ProductController extends Controller
{
    protected $productRepo;

    public function __construct(ProductInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }


    public function DetailProduct(Request $request)
    {
        $result = $this->productRepo->getdetailProduct($request->p);

        $projectDone = $this->productRepo->getProjectDone();

        if ( !$result) {
            abort(404, 'Not found');
        }

        $view = $result[0]['views'] + 1;
           
        $this->productRepo->update($result[0]['id'], ['views' => $view]);
        
        return view('client.pages.detail-product', compact('result', 'projectDone'));
    }

    public function detailProductHome($query) 
    {
        $projectDone = $this->productRepo->getProjectDone();

        $result = $this->productRepo->getdetailProduct($query);

        if ( !$result) {
            abort(404, 'Not found');
        }
       
        return view('client.pages.detail-product', compact('result', 'projectDone'));
    }
}
