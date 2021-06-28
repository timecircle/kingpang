<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;

use App\Models\Category;
use App\Models\Freelancer;

use Illuminate\Http\Request;
use App\Classes\Search;

class ProductController extends DevController
{
  protected $reg  = [
    'name'    => 'required|string|min:3',
    'avatar'  => 'max:1024',
  ];

  public function all()
  {
    $search = (new search('product_all'))->get();
    $query  = Product::root()->inventory();
    $query->search($search)->so();
    return view('dev.product.all', compact('query'));
  }
  
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Freelancer $freelancer)
  {
    $search = (new search('product'))->get();
    $query  = Product::root()->inventory()->whereFreelancerId($freelancer->id);
    $query->search($search)->so();
    return view('dev.product.index', compact('query','freelancer'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Freelancer $freelancer)
  {
    $category = request('category',0);
    return view('dev.product.create', compact('freelancer','category'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, Freelancer $freelancer)
  {
    $this->beforeSave($request);
    if ($this->validator()->fails()) {
      return $this->backErr();
    }

    $product = Product::create($this->data);
    if ($request->hasFile('avatar')) {
      $product->upAvatar($request->avatar);
    }
    $this->afterSave($request, $product);

    return redirect()->route('products.edit', $product)->with('toastr', [
      'status' => 'success', 'message' => 'Record created!'
    ]);
  }

  /**
   * Create Order.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */



  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product)
  {
    $recommend  = Product::root()->inventory()
      ->where('freelancer_id', '<>', $product->freelancer_id)
      ->whereCategoryId($product->category_id);

    return view('page.product.detail')->with([
      'productType'       =>  $product->type,
      'productCategory'   =>  $product->category,
      'product'           =>  $product,
      'freelancer'        =>  $product->freelancer,
      'recommend'         =>  $recommend,
      'packs'             =>  $product->getPacks()->get(),
      'tabs'              =>  [
        'description',
        'portfolio',
        'price',
        'recommendations',
        'review'
      ],
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    return view('dev.product.edit', compact('product'));
  }



  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Product $product)
  {
    $this->beforeSave($request);
    if ($this->validator()->fails()) return $this->backErr();

    $product->update($this->data);

    if ($request->hasFile('avatar')) {
      $product->storeAvatar($request->avatar);
    }

    $this->afterSave($request, $product);
    return redirect()->back()->with('toastr', [
      'status' => 'success', 'message' => 'Record updated!'
    ]);
  }




  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    $product->delete();
    return $this->back(['status' => 'success', 'message' => 'Record deleted!']);
  }
  function afterSave(Request $request, Product $product)
  {

    foreach ($this->packs  as $pack) {
      $pp     = $product->getPacks()->wherePack($pack)->first();
      $price  = $this->data[$pack . '_price'];
      if (empty($request->extends)) return;

      if (in_array($pack, $request->extends)) {
        if (empty($pp)) {
          $pp = $product->ext();
          $pp->pack = $pack;
        }
        foreach (config('dev.attributes') as $atb) {
          $pp->$atb = $this->data[$pack . "_$atb"];
        }
        $pp->save();
      } elseif (isset($pp)) {
        $pp->delete();
      }
    }
  }

  function beforeSave(Request $request)
  {
    $this->data = $request->input();

    $this->packs = config('dev.packs');

    $this->data['pack']  = $this->packs[0];

    foreach (config('dev.attributes') as $atb) {
      $this->data[$atb] = $this->data[$this->data['pack'] . "_$atb"];
    }
    unset($this->packs[0]);

    $this->reg[$this->data['pack'] . '_price']  = 'required|numeric|min:4';
    if ($request->extends) {
      foreach ($request->extends as $p) {
        $this->reg[$p . '_price']  = 'required|numeric|min:4';
      }
    }
  }
}
