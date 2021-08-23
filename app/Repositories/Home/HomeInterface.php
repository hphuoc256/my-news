<?php
namespace App\Repositories\Home;

use App\Repositories\RepositoryInterface;

interface HomeInterface extends RepositoryInterface
{
    
    public function getDataHome();

    public function dashboardAdmin();
}