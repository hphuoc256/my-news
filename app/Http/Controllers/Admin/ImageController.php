<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Repositories\Image\ImageInterface;

class ImageController extends Controller
{
    protected $imgRepo;

    public function __construct(ImageInterface $imgRepo)
    {
        $this->imgRepo = $imgRepo;
    }

    public function getListImage() {
        return view('admin.pages.image.list-image');
    }

    public function postListImage() {
        $result = $this->imgRepo->getAll()->toArray();
        return $result;
    }

    public function getAddImage() {
        return view('admin.pages.image.add-image');
    }

    public function postAddImage(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:50',
                'image' => 'required',
            ]);
       
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
    
            $data = [
                'name' => $request['name'],
            ];
            
            if($file = $request->hasFile('image')) {           
                $file = $request->file('image');          
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/image/';
                $file->move($destinationPath, $fileName);
                $data['url'] = asset('/image/').'/'.$fileName;
            }
            
            $this->imgRepo->create($data);
            return redirect()->route('getImage')->with('message', 'Successfully');
            
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error! An error occurred. Please try again later !');
        }
        
    }

    public function getDetailImage($id) {
        $detail = $this->imgRepo->find($id);
        return view('admin.pages.image.edit-image', compact('detail'));
    }

    public function postDetailImage(Request $request, $id) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:50',
            ]);
       
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
    
            $data = [
                'name' => $request['name'],
            ];
            
            if($file = $request->hasFile('image')) {           
                $file = $request->file('image');          
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/image/';
                $file->move($destinationPath, $fileName);
                $data['url'] = asset('/image/').'/'.$fileName;
            }
            
            $this->imgRepo->update($id, $data);
            return redirect()->back()->with('message', 'Successfully'); 

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error! An error occurred. Please try again later !');
        }
        
    }
}
