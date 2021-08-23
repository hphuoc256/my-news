<?php
namespace App\Repositories\News;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewsRepository extends BaseRepository implements NewsInterface
{
    // public function __construct(Model $model)
    // {
    //     parent::__construct($model);        
    // }
    
    //get model
    public function getModel()
    {
        return \App\Models\News::class;
    }

    public function getlistNews()
    {
        try {
            $list_news = DB::table('news')
                ->orderBy('news.views', 'desc')
                ->where('status', 1)->paginate(4);
            
            foreach($list_news as $key=>$item) {
                $list_news[$key] = json_decode(json_encode($item),true);
            }
           
            $news_new  = $this->model->take(5)->where('status', 1)->orderBy('created_at', 'desc')->get()->toArray();

            $news_hot  = $this->model->take(5)->where('status', 1)->where('hot', 1)->orderBy('created_at', 'desc')->get()->toArray();

            $response = [
                'list_news' => $list_news,
                'news_new'  => $news_new,
                'news_hot'  => $news_hot
            ];
            
            return $response;
        } 
        catch (Exception $e) {

            Log::error("#news- ERROR" .$e);
        }
    }

    public function getinfoNews($attributes)
    {
        try {
            $response =  $this->model->where('slug', $attributes)->get()->toArray();
            
            return $response;
        } 
        catch (Exception $e) {

            Log::error("#news- ERROR" .$e);
        }
    }

    public function searchNews ($attributes) {
        try {
            $search_news = DB::table('news')
                ->select('news.*')   
                ->where('news.title', 'LIKE', "%$attributes%")
                ->orderBy('news.created_at', 'desc')
                ->where('news.status', 1)
                ->paginate(4);
            foreach($search_news as $key=>$item) {
                $search_news[$key] = json_decode(json_encode($item),true);
            }

            $news_new  = $this->model->take(5)->where('status', 1)->orderBy('created_at', 'desc')->get()->toArray();

            $news_hot  = $this->model->take(5)->where('status', 1)->where('hot', 1)->orderBy('created_at', 'desc')->get()->toArray();

            $response = [
                'list_news' => $search_news,
                'news_new'  => $news_new,
                'news_hot'  => $news_hot
            ];
            
            return $response;
        }
        catch (Exception $e) {
            Log::error("#search- ERROR" .$e);
        }
    }
}