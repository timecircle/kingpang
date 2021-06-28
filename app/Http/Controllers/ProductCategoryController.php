<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductCategoryController extends DevController
{
    protected $reg  = [
        'name'  => 'required|string|min:3',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = request('type');
        $list = ProductCategory::whereTypeId($type)->paginate();

        return view('dev.product.category.index')->with([
          'list'  =>  $list,
          'type'  =>  $type,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $this->data['type_id'] = request('type');

        if($this->validator()->fails()) return $this->backErr();

        if(ProductCategory::create($this->data))
            return $this->back(['status'=>'success','message'=>'Record created!']);

        return $this->back(['status'=>'failed','message'=>'Error!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
        $incate   = collect($productCategory->tree())->pluck('id');
        $incate[] = $productCategory->id;
        $products = Product::root()->inventory()->whereIn('category_id',$incate)->paginate();

        return view('page.product.list')->with([
          'products'         =>  $products,
          'productCategory'  =>  $productCategory,
          'productType'      =>  $productCategory->type,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $this->data = $request->input();
        if($this->validator()->fails()) return $this->backErr();

        $productCategory->update($this->data);
        return $this->back(['status'=>'success','message'=>'Record updated!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return $this->back(['status'=>'success','message'=>'Record deleted!']);
    }
}
