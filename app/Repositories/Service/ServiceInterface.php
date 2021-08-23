<?php
namespace App\Repositories\Service;

use App\Repositories\RepositoryInterface;

interface ServiceInterface extends RepositoryInterface
{
    public function getServiceID();

}