<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Classes\Search;

class PostController extends DevController
{
    protected $reg  = [
        'name'  => 'required|string|min:3',
    ];

    public function page()
    {
        return $this->index('page');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($is = 'post')
    {

        $search = (new search($is))->get();
        $search->is =  $is;
        $query  =  Post::search($search)->so();

        return view(
            'dev.post.index',
            compact(
                'query',
                'is'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      
        if ($request->category) {
            $categories = Category::whereParentId($request->category)->arrange();
            return view('dev.post.create', compact('categories'));
        }
        return view('dev.post.create');
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

        $Post = Post::create($this->data);
        if ($request->hasFile('avatar')) {
            $Post->storeAvatar($request->avatar);
        }

        return redirect()->route('posts.edit', $Post)->with('toastr', [
            'status' => 'success', 'message' => 'Record created!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function show(Post $Post)
    {
      
        return empty($Post->category) ?
            view('page.post.static', compact('Post')) :
            view('page.post.detail', compact('Post'))->with(['category' => $Post->category]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $Post, Request $request)
    {
        $categories = Category::whereParentId($request->category)->arrange();
        return view('dev.post.edit', compact('Post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function update(Post $Post, Request $request)
    {
        $this->data = $request->input();
        if ($this->validator()->fails()) return $this->backErr();
        $Post->update($this->data);
        if ($request->hasFile('avatar')) {
            $Post->storeAvatar($request->avatar);
        }

        return redirect()->back()->with('toastr', [
            'status' => 'success', 'message' => 'Record updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $Post)
    {
        $Post->delete();
        return $this->back(['status' => 'success', 'message' => 'Record deleted!']);
    }
}
