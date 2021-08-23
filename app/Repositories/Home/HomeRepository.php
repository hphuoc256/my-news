<?php
namespace App\Repositories\Home;

use App\Repositories\BaseRepository;
use App\Models\Service;
use App\Models\Image;
use App\Models\News;
use App\Models\User;
use App\Models\Product;
use App\Models\Contact;

class HomeRepository extends BaseRepository implements HomeInterface
{
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    public function getDataHome()
    {
        try {
            // Danh sách category
            $category =  buildTree($this->model->get()->toArray());
            
            // Danh sách dịch vụ
            $service = buildTree(Service::where('status', 1)->with('products')->where('status', 1)->with('images')->get()->toArray());
           
            //Service 5 convert
            $title_service5 = $service[5]['title'];
            $service_5 = [
                'data' => $service[5],
                'convert_title' => parse_json_decode($title_service5)
            ];
            
            //Service 2 convert
            $img_service2 = $service[2]['data_children'];

            $news_new  = News::take(4)->where('status', 1)->orderBy('created_at', 'desc')->get()->toArray();
            
            $response = [
                'overall_service'    => $service[0],
                'service_pack'       => $service[1],
                'theme_website'      => $service[2],
                'why_choose_service' => $service[3],
                'slider'             => $service[4],
                'newsBSMEDIA'        => $service_5,
                'category'           => $category,
                'news_new'           => $news_new
            ];
            // dd($response);

            return $response;
        } 
        catch (Exception $e) {
            Log::error("#Home- ERROR" .$e);
        }
    }

    public function dashboardAdmin() {
        $totalUsers = User::get()->toArray();
        $totalNews = News::get()->toArray();
        $totalProducts = Product::get()->toArray();
        $totalContacts = Contact::where('status', 0)->get()->toArray();
        $totalServices = Service::get()->toArray();
       
        $_products = 0;
        foreach ($totalProducts as $key=>$item ) {
            $_products = $_products + $item['views'];
        }

        $_news = 0;
        foreach ($totalNews as $key=>$item ) {
            $_news = $_news + $item['views'];
        }
        
        return [
            'users' => count($totalUsers),
            'news' => count($totalNews),
            'products' => count($totalProducts),
            'contacts' => count($totalContacts),
            'services' => count($totalServices),
            'totalviews' => $_products + $_news
        ];
    }

}