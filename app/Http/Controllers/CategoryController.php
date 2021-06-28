<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Classes\Search;

class CategoryController extends DevController
{
    protected $reg  = [
        'name' => 'required|string|min:3',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($prefix = null)
    {
        $id     =   request('id', 0);
        $search =   (new search("category_$prefix"))->get();

        $query  =   Category::wherePrefix($prefix)->whereParentId($id)->search($search)->so();
        $list   =   $query->paginate();
        $item   =   Category::find($id);

        return view(
            'dev.category.index',
            compact(
                'list',
                'id',
                'item',
                'prefix',
            )
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->data = $request->input();
        if ($this->validator()->fails()) return $this->backErr();
        $category   =   Category::create($this->data);
        if ($request->hasFile('avatar')) {
            $category->upAvatar($request->avatar);
        }
        return $this->back(['status' => 'success', 'message' => 'Record created!']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        switch ($category->prefix) {
            case 'service':
                $query =   Product::root()->inventory()->category($category)->so();
                $view  =  'page.product.list';
                $is    =  'page.service';
                break;
            default:
                $query  =  Post::so()->category($category);
                $view   = 'page.post.list';
                $is     = 'page.post';
                break;
        }
        $search = (new search($is))->get();
        //$query->orWhereIn('category_id', $category->path());
       
        //$query->search($search)->so();

        return view($view, compact('query', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->data = $request->input();
        if ($this->validator()->fails()) return $this->backErr();
       
        $category->update($this->data);
        if ($request->hasFile('avatar')) {
            $category->storeAvatar($request->avatar);
           
        }
        return $this->back(['status' => 'success', 'message' => 'Record updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $this->back(['status' => 'success', 'message' => 'Record deleted!']);
    }
}
