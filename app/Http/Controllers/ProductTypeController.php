<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Models\Product;
use App\Models\Link;
use App\Models\Media;

use Illuminate\Http\Request;

class ProductTypeController extends DevController
{
    protected $reg  = [
          'name'  => 'required|string|min:3',
          'avatar' => 'image|max:1024',
      ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(ProductType::paginate());

        return view('dev.product.type.index')->with([
          'list'  =>  ProductType::paginate(),
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


         //$request->file('avatar')->store('avatars');
        $this->data = $request->input();
        if($this->validator()->fails()) return $this->backErr();
        $model =  ProductType::create($this->data);

        if($request->hasFile('avatar')){
            $model->upAvatar($request->avatar);
        }
        return redirect()->back()->with('toastr',[
          'status'=>'success','message'=>'Record created!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {

        $products =Product::root()->inventory()->whereTypeId($productType->id)->paginate();
        return view('page.product.list',compact(
          'productType',
          'products',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $productType)
    {
        $this->data = $request->input();
        if($this->validator()->fails()) return $this->backErr();
        $productType->update($this->data);

        if($request->hasFile('avatar')){
          
            $productType->storeAvatar($request->avatar);
        }
        return redirect()->back()->with('toastr',[
          'status'=>'success','message'=>'Record updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        $productType->delete();
        return redirect()->back()->with('toastr',[
          'status'=>'success','message'=>'Record deleted!'
        ]);
    }
}
