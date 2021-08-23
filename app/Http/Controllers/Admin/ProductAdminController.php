<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Product\ProductInterface;

class ProductAdminController extends Controller
{
    protected $productRepo;

    public function __construct(ProductInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getListProduct() {
        return view('admin.pages.product.list-product');
    }

    public function postListProduct() {
        $result = $this->productRepo->getList();
        return $result;
    }

    public function getAddProduct() {
        $services = $this->productRepo->getService();
        $categories = $this->productRepo->getCategory();
        return view('admin.pages.product.add-product', compact('services', 'categories'));
    }

    public function postAddProduct(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:50',
                'slug' => 'required',
            ]);
       
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
    
            $data = [
                'name' => $request['name'],
                'slug' => $request['slug'],
                'link' => $request['link'],
                'status' => $request['status'],
                'service_id' => $request['service_id'],
                'title' => $request['title'],
                'description' => $request['description'],
                'meta_keyword' => $request['meta_keyword'],
                'category_id' => $request['category_id'],
                'meta_description' => $request['meta_description'],
                'hot' => $request['hot'] ? $request['hot'] : 0,
                'user_id' => Auth::user()->id
            ];
            
            if($file = $request->hasFile('image')) {           
                $file = $request->file('image');          
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/image/';
                $file->move($destinationPath, $fileName);
                $data['image'] = asset('/image/').'/'.$fileName;
            }
            
            $this->productRepo->create($data);
            return redirect()->route('getProduct')->with('message', 'Successfully');

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error! An error occurred. Please try again later !');
        }
    }

    public function deleteProduct($id) {
        $result = $this->productRepo->delete($id);
        if ($result == true ) {
            return response()->json([
                'status' => true,
                'message' => 'success'
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'error'
        ], 200);
    }

    public function getDetailProduct($id) {
        $detail = $this->productRepo->find($id);
        $services = $this->productRepo->getService();
        $categories = $this->productRepo->getCategory();
        return view('admin.pages.product.edit-product', compact('detail', 'services', 'categories'));
    }

    public function postDetailProduct(Request $request, $id) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:50',
                'slug' => 'required',
            ]);
       
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
    
            $data = [
                'name' => $request['name'],
                'slug' => $request['slug'],
                'link' => $request['link'],
                'status' => $request['status'],
                'service_id' => $request['service_id'],
                'category_id' => $request['category_id'],
                'title' => $request['title'],
                'description' => $request['description'],
                'meta_keyword' => $request['meta_keyword'],
                'meta_description' => $request['meta_description'],
                'hot' => $request['hot'] ? $request['hot'] : 0,
                'user_id' => Auth::user()->id
            ];
           
            if($file = $request->hasFile('image')) {           
                $file = $request->file('image');          
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/image/';
                $file->move($destinationPath, $fileName);
                $data['image'] = asset('/image/').'/'.$fileName;
            }
    
            $this->productRepo->update($id, $data);
            return redirect()->back()->with('message', 'Successfully');

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error! An error occurred. Please try again later !');
        } 
    }
}
