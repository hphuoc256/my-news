<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Repositories\Home\HomeInterface;
use App\Repositories\Home\HomeRepository;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\News\NewsInterface;
use App\Repositories\News\NewsRepository;
use App\Repositories\Contacts\ContactInterface;
use App\Repositories\Contacts\ContactRepository;
use App\Repositories\User\UserInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Service\ServiceInterface;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\Image\ImageInterface;
use App\Repositories\Image\ImageRepository;

use App\Models\Category;
use App\Models\Product;
use App\Models\News;
use App\Models\Contact;
use App\Models\User;
use App\Models\Service;
use App\Models\Image;

class BSmediaServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HomeInterface::class, function(){
            return new HomeRepository();
        });
        $this->app->bind(ProductInterface::class, function(){
            return new ProductRepository();
        });
        $this->app->bind(NewsInterface::class, function(){
            return new NewsRepository();
        });
        $this->app->bind(ContactInterface::class, function(){
            return new ContactRepository();
        });
        $this->app->bind(UserInterface::class, function(){
            return new UserRepository();
        });
        $this->app->bind(CategoryInterface::class, function(){
            return new CategoryRepository();
        });
        $this->app->bind(ServiceInterface::class, function(){
            return new ServiceRepository();
        });
        $this->app->bind(ImageInterface::class, function(){
            return new ImageRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['client.layout.header'], function ($view) {
            $category = Category::where('parent_id',0)->where('status', 1)->get();
            
            $view->with(['category' => $category]);
        });
    }
   
}
