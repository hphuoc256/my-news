<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\News\NewsInterface;

class NewsController extends Controller
{
    protected $newsRepo;

    public function __construct(NewsInterface $newsRepo)
    {
        $this->newsRepo = $newsRepo;
    }

    public function InfoBlog(Request $request) {
        $query = !empty($request->n) ? $request->n : '';
        
        if( $query === '')
        {
            $result = $this->newsRepo->getlistNews();
           
            return view('client.pages.list-news', compact('result'));
        }
        else {
            $result = $this->newsRepo->getinfoNews($request->n);

            if ( !$result) {
                abort(404, 'Not found');
            }

            $view = $result[0]['views'] + 1;
           
            $this->newsRepo->update($result[0]['id'], ['views' => $view]);
            
            return view('client.pages.detail-news', compact('result'));
        }
    }

    public function search(Request $request) {

        $search = $request->search;

        $result = $this->newsRepo->searchNews($search);

        if ( !$result) {
            abort(404, 'Not found');
        }

        return view('client.pages.list-news', compact('result'));
    }

}
