<?php
namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductInterface extends RepositoryInterface
{
    //CLient
    public function getdetailProduct($attributes);

    public function getProjectDone();

    //Admin
    public function getList();

    public function getService();

    public function getCategory();
}