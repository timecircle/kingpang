<?php

namespace App\Http\Controllers\Dev;

use App\Models\Link;
use App\Models\ProductType;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public function index()
    {
        return view('dev.dashboard');
    }
    public function login()
    {
        return view('dev.login');
    }
}
