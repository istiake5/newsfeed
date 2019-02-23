<?php

namespace App\Providers;
use App\Cat;
use App\Slider;
use App\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        View::composer('*', function ($view) {
            $view->with('cats', $cats = Cat::all());
        });


        View::composer('*', function ($view) {
            $view->with('posts', $posts = Post::all());
        });

        view::composer('layouts.sidebar',function($abc){
            $latest = Post::with('cat')->orderBy('id','desc')->where('status','Normal Post')->take(5)
                ->get();
            $abc->with('latest',$latest);
        });

        view::composer('layouts.slider',function($slide){
            $slider = Slider::orderBy('id','desc')

                ->take(2)

                ->get();
            $slide->with('slider',$slider);
        });


      view::composer('layouts.popularPost',function($popular){
           $poplpost = Post::with('cat')->orderBy('count','desc')->take(5)
        ->get();
          $popular->with('poplpost',$poplpost);
 });


		Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
