<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Home\HomeInterface;

class DashboardController extends Controller
{
    protected $resultRepo;

    public function __construct(HomeInterface $resultRepo)
    {
        $this->resultRepo = $resultRepo;
    }

    public function index() {
        $result = $this->resultRepo->dashboardAdmin();
        
        return view('admin.pages.dashboard', compact('result'));
    } 
}
