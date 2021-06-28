<?php

namespace App\Http\Controllers\Web;

use App\Models\Link;
use App\Models\Product;
use App\Models\Media;
use App\Models\Category;
use App\Models\Post;
use App\Models\Block;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Freelancer;
use Auth;
class PageController extends Controller
{
    public function home()
    {
        /*
        foreach (Post::get() as $post) {
        $media= Media::whereCode($post->code)->first();
            if($media){
                $post->update(['avatar_id'=>$media->id]);
                echo $media->code . '</br>'; 
            }
        }
        exit;
        */
        //$query =  Product::inventory()->take(3)->orderByDesc('created_at');
      
        return Auth::user() ? view('page.auth') : view('page.home');
    }

    public function king()
    {

        $query =  Product::take(6)->orderByDesc('created_at');
        return view('page.king', compact('query'));
    }

    public function page($pretty)
    {
        $link   =   Link::findBy($pretty);
        if (empty($link)) return abort(404);

        $sw  =  Str::replaceFirst('App\\Models', 'App\\Http\\Controllers', $link->model_type);
        $sw .=  'Controller';

        return (new $sw)->show($link->model);
    }
}
