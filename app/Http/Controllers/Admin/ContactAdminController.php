<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contacts\ContactInterface;
use Validator;
use Illuminate\Support\Facades\Mail;

class ContactAdminController extends Controller
{
    protected $contactRepo;

    public function __construct(ContactInterface $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }

    public function getListContact() {
        return view('admin.pages.contact.list-contact');
    }

    public function postListContact() {
        $result = $this->contactRepo->getAll()->toArray();
        return $result;
    }

    public function getDetailContact($id) {
        $detail = $this->contactRepo->find($id);
        return view('admin.pages.contact.edit-contact', compact('detail'));
    }

    public function postFeedback(Request $request, $id) {
        try {
            $validator = Validator::make($request->all(), [
                'content' => 'required',
            ]);
       
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
    
            $data = [
                'content' => $request['content'],
            ];
            $email = $request->email;
            
            \Mail::to($email)->send(new \App\Mail\SendMailFeedback($data['content']));
    
            $this->contactRepo->update($id, ['status' => 1]);
    
            return redirect()->back()->with('message', 'Successfully');

        } catch (\Exception $e) {
            
            return back()->withErrors('Error! An error occurred. Please try again later !');
        }
        
    }
}
