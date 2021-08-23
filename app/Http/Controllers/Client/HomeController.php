<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Repositories\Home\HomeInterface;

class HomeController extends Controller
{
    /**
     * @var HomeInterface|\App\Repositories\Repository
     */
    protected $resultRepo;

    public function __construct(HomeInterface $resultRepo)
    {
        $this->resultRepo = $resultRepo;
    }

    public function index()
    {
        $result = $this->resultRepo->getDataHome();
        
        return view('client.pages.home', compact('result'));
    }


}