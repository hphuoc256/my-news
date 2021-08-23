<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Repositories\Category\CategoryInterface;

class CategoryAdminController extends Controller
{
    protected $cateRepo;

    public function __construct(CategoryInterface $cateRepo)
    {
        $this->cateRepo = $cateRepo;
    }

    public function getListCategory() {
        return view('admin.pages.category.list-category');
    }

    public function postListCategory() {
        $result = $this->cateRepo->getAll()->toArray();
        return $result;
    }

    public function getAddCategory() {
        $parent_id = $this->cateRepo->getParentId();
        return view('admin.pages.category.add-category', compact('parent_id'));
    }

    public function postAddCategory(Request $request) {
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
                'parent_id' => $request['parent_id']
            ];
            
            if($file = $request->hasFile('image')) {           
                $file = $request->file('image');          
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/image/';
                $file->move($destinationPath, $fileName);
                $data['image'] = asset('/image/').'/'.$fileName;
            }
    
            $this->cateRepo->create($data);
            return redirect()->route('getCategory')->with('message', 'Successfully!');

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error! An error occurred. Please try again later !');
        }
    }

    public function deleteCategory($id) {
        $result = $this->cateRepo->delete($id);
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

    public function getDetailCategory($id) {
        $detail = $this->cateRepo->find($id)->toArray();
        $parent_id = $this->cateRepo->getParentId();

        return view('admin.pages.category.edit-category', compact('detail', 'parent_id'));
    }

    public function postDetailCategory(Request $request, $id) {
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
                'parent_id' => $request['parent_id']
            ];
            
            if($file = $request->hasFile('image')) {           
                $file = $request->file('image');          
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/image/';
                $file->move($destinationPath, $fileName);
                $data['image'] = asset('/image/').'/'.$fileName;
            }
    
            $this->cateRepo->update($id, $data);
            return redirect()->back()->with('message', 'Successfully');
            
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error! An error occurred. Please try again later !');
        }
    }
}
