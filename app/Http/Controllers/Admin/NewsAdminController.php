<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Repositories\News\NewsInterface;

class NewsAdminController extends Controller
{
    protected $newsRepo;

    public function __construct(NewsInterface $newsRepo)
    {
        $this->newsRepo = $newsRepo;
    }

    public function getListNews() {
        return view('admin.pages.news.list-news');
    }

    public function postListNews() {
        $result = $this->newsRepo->getAll()->toArray();
        return $result;
    }

    public function getAddNews() {
        return view('admin.pages.news.add-news');
    }

    public function postAddNews(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:100',
                'slug' => 'required',
                'title' => 'required',
                'description' => 'required',
            ]);
       
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
    
            $data = [
                'user_id' => Auth::user()->id,
                'name' => $request['name'],
                'slug' => $request['slug'],
                'title' => $request['title'],
                'description'  => $request['description'],
                'status' => $request['status'], 
                'hot' => $request['hot'] ? $request['hot'] : 0,
                'meta_keyword' => $request['meta_keyword'],
                'meta_description' => $request['meta_description']
            ];
            
            if($file = $request->hasFile('image')) {           
                $file = $request->file('image');          
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/image/';
                $file->move($destinationPath, $fileName);
                $data['image'] = asset('/image/').'/'.$fileName;
            }
            
            $this->newsRepo->create($data);
            return redirect()->route('getNews')->with('message', 'Successfully');

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error! An error occurred. Please try again later !');
        } 
    }

    public function deleteNews($id) {
        $result = $this->newsRepo->delete($id);
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

    public function getDetailNews($id) {
        $detail = $this->newsRepo->find($id);
        return view('admin.pages.news.edit-news', compact('detail'));
    }

    public function postDetailNews(Request $request, $id) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:100',
                'slug' => 'required',
                'title' => 'required',
                'description' => 'required',
            ]);
       
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
    
            $data = [
                'user_id' => Auth::user()->id,
                'name' => $request['name'],
                'slug' => $request['slug'],
                'title' => $request['title'],
                'description'  => $request['description'],
                'status' => $request['status'], 
                'hot' => $request['hot'] ? $request['hot'] : 0,
                'meta_keyword' => $request['meta_keyword'],
                'meta_description' => $request['meta_description']
            ];
            
            if($file = $request->hasFile('image')) {           
                $file = $request->file('image');          
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/image/';
                $file->move($destinationPath, $fileName);
                $data['image'] = asset('/image/').'/'.$fileName;
            }
           
            $this->newsRepo->update($id, $data);
            return redirect()->back()->with('message', 'Successfully');

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error! An error occurred. Please try again later !');
        }    
    }
}
