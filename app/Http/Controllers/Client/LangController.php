<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Closure;
class LangController extends Controller
{
    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);
    
        return redirect()->back();
    }
}
