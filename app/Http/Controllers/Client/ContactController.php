<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Validator;
use App\Repositories\Contacts\ContactInterface;

class ContactController extends Controller
{
    protected $contactRepo;

    public function __construct(ContactInterface $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }

    public function SendMail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string',
            'email'     => 'required|email',
            'title'     => 'required|string',
            'content'   => 'required|string',
        ]);
   
        if ($validator->fails()) {
           
            return response()->json([
                'status' => false, 
                'message' => "Send message failed!",
                'error' => $validator->errors()->toJson(),
            ], 201);
        }
       
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'title' => $request['title'],
            'content' => $request['content']
        ];

        $contact = Contact::create($data);
        
        return response()->json([
            'status' => true, 
            'message' => "Send message success!",
        ], 200);

    }
}
