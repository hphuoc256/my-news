<?php
namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserInterface extends RepositoryInterface
{
    public function loginAdmin($attributes);

    public function checkEmail($attributes);
}