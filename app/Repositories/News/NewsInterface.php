<?php
namespace App\Repositories\News;

use App\Repositories\RepositoryInterface;

interface NewsInterface extends RepositoryInterface
{
    
    public function getinfoNews($attributes);

    public function searchNews($attributes);
}