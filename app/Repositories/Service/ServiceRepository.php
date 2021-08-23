<?php
namespace App\Repositories\Service;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\BaseRepository;
use App\Models\Service;


class ServiceRepository extends BaseRepository implements ServiceInterface
{
    public function getModel() {
        return \App\Models\Service::class;
    }

    public function getServiceID() {
        $result = $this->model->where('parent_id', 0)->get();
        return $result;
    }
}