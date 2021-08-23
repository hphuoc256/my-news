<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Repositories\User\UserInterface;

class UserAdminController extends Controller
{
    protected $userRepo;

    public function __construct(UserInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getLogin() {
        return view('admin.pages.auth.login');
    }

    public function postLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $data = [
            'email' => $request['email'],
            'password' => $request['password']
        ];

        $result = $this->userRepo->loginAdmin($data);

        if ($result === true) {
            if(Auth::user()->level == 0) {
                Auth::logout();
                return redirect()->back()->withInput()->withErrors('Can not access.');
            }

            if(Auth::user()->status == 0) {
                Auth::logout();
                return redirect()->back()->withInput()->withErrors('Account is block.');
            }

            return redirect()->route('dashboard');
        }

        return redirect()->back()->withInput()->withErrors('Email or password incorrect.');
    }

    public function logout() {
        if (Auth::check() && Auth::user()->level !== 0) {
            Auth::logout();
            return redirect()->route('getLogin');
        }
    }

    public function getListUser() {
        return view('admin.pages.auth.list-user');
    }

    public function postListUser() {
        $result = $this->userRepo->getAll()->toArray();
        return $result;
    }

    public function getAddUser(Request $request) {
        return view('admin.pages.auth.add-user');
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
            're_password' => 'required|same:password|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'level' => $request['level'],
            'status' => 1
        ];

        $check_email =  $this->userRepo->checkEmail($data['email']);
        if ($check_email) {
            return redirect()->back()->withInput()->withErrors('Email already exists!');
        }

        $this->userRepo->create($data);
        return redirect()->route('getUser')->with('message', 'Successfully');
    }

    public function profile() {
        return view('admin.pages.auth.profile');
    }

    public function updateProfile(Request $request) {
        $data = [
            'username' => $request['username'],
            'gender' => $request['gender'],
            'birthday' => $request['birthday'],
            'address' => $request['address'],
            'phone' => $request['phone']
        ];

        $this->userRepo->update(Auth::user()->id, $data);

        return redirect()->back()->with('message', 'Update profile successfully !');
    }

    public function changePassword() {
        return view('admin.pages.auth.change-password');
    }

    public function postChangePassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|min:6',
            're_password' => 'required|same:password|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if (!Hash::check($request['old_password'], Auth::user()->password)) {
            return back()->withErrors('Old password does not match!');
        }

        $data = [
            'password' => Hash::make($request['password']),
        ];

        $this->userRepo->update(Auth::user()->id, $data);

        return redirect()->back()->with('message', 'Update profile successfully !');
    }

    public function getDetailUser($id) {
        $detail = $this->userRepo->find($id);

        return view('admin.pages.auth.edit-user', compact('detail'));
    }

    public function postDetailUser(Request $request, $id) {
        try{
            if ( $request['password'] ) {
                $data = [
                    'password' => Hash::make($request['password']),
                    'status' => $request['status'],
                    'level' => $request['level']
                ];
                $this->userRepo->update($id, $data);
            } else {
                $data = [
                    'status' => $request['status'],
                    'level' => $request['level']
                ];
                $this->userRepo->update($id, $data);
            }

            return redirect()->back()->with('message', 'Update profile successfully !');
        }
        catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error! An error occurred. Please try again later !');
        }
    }
}
