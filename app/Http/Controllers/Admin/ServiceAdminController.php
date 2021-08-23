<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Repositories\Service\ServiceInterface;

class ServiceAdminController extends Controller
{
    protected $serviceRepo;

    public function __construct(ServiceInterface $serviceRepo)
    {
        $this->serviceRepo = $serviceRepo;
    }

    public function getListService() {
        return view('admin.pages.service.list-service');
    }

    public function postListService() {
        $result = $this->serviceRepo->getAll()->toArray();
        return $result;
    }

    public function getAddService() {
        $services = $this->serviceRepo->getServiceID();
        return view('admin.pages.service.add-service', compact('services'));
    }

    public function postAddService(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:50',
                'title' => 'required',
                'description' => 'required'
            ]);
       
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
    
            $data = [
                'name' => $request['name'],
                'parent_id' => $request['parent_id'],
                'title' => $request['title'],
                'description' => $request['description'],
                'status'=> $request['status'],
                'meta_keyword' => $request['meta_keyword'],
                'meta_description' => $request['meta_description'],
                'price' => $request['price'],
                'sell' => $request['sell'],
                'slug' => $request['slug']
            ];
            
            if($file = $request->hasFile('image')) {           
                $file = $request->file('image');          
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/image/';
                $file->move($destinationPath, $fileName);
                $data['image'] = asset('/image/').'/'.$fileName;
            }
    
            $this->serviceRepo->create($data);
            return redirect()->route('getService')->with('message', 'Successfully !');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error! An error occurred. Please try again later !');
        }
    }

    public function deleteService($id) {
        $detai = $this->serviceRepo->find($id);
        
        if ( $detai['parent_id'] == 0 ) {
            return response()->json([
                'status' => false,
                'message' => 'Can not delete this service.'
            ], 200);

        } else {
            $result = $this->serviceRepo->delete($id);
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
    }

    public function getDetailService($id) {
        $detail = $this->serviceRepo->find($id)->toArray();
        $services = $this->serviceRepo->getServiceID(); 
        return view('admin.pages.service.edit-service', compact('services', 'detail'));
    }

    public function postDetailService(Request $request, $id) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:50',
                'title' => 'required',
                'description' => 'required'
            ]);
       
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
    
            $data = [
                'name' => $request['name'],
                'parent_id' => $request['parent_id'],
                'title' => $request['title'],
                'description' => $request['description'],
                'status'=> $request['status'],
                'meta_keyword' => $request['meta_keyword'],
                'meta_description' => $request['meta_description'],
                'price' => $request['price'],
                'sell' => $request['sell'],
                'slug' => $request['slug']
            ];
            
            if($file = $request->hasFile('image')) {           
                $file = $request->file('image');          
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/image/';
                $file->move($destinationPath, $fileName);
                $data['image'] = asset('/image/').'/'.$fileName;
            }
    
            $this->serviceRepo->update($id, $data);
            return redirect()->back()->with('message', 'Successfully !');

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error! An error occurred. Please try again later !');
        }
    }
}
