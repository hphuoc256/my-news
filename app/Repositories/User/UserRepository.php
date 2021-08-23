<?php
namespace App\Repositories\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\BaseRepository;
use App\Models\User;


class UserRepository extends BaseRepository implements UserInterface
{
    public function getModel() {
        return \App\Models\User::class;
    }

    public function loginAdmin($attributes) {
        if (Auth::attempt($attributes)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmail($attributes) {
        $result = $this->model->where('email', $attributes)->get()->toArray();
        return $result;
    }

}