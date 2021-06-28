<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Classes\Search;

class BlockController extends DevController
{
  protected $reg  = [
    'title'  => 'required|string',
  ];
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $search = (new search('block'))->get();
    $prefix= request('prefix',null); 
    $query = Block::whereModelType(null); 
    $query->wherePrefix($prefix)->search($search);
    $query->orderByDesc('code')->orderByDesc('priority')->orderByDesc('created_at');
    return view('dev.block.index',compact('query','prefix'));
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
    if ($this->validator()->fails()) return $this->backErr();


    $model = Block::create($this->data);

    if ($request->hasFile('avatar')) {
      $model->upAvatar($request->avatar);
    }
    return redirect()->back()->with('toastr', [
      'status' => 'success', 'message' => 'Record created!'
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Block  $Block
   * @return \Illuminate\Http\Response
   */
  public function show(Block $Block)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Block  $Block
   * @return \Illuminate\Http\Response
   */
  public function edit(Block $Block)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Block  $Block
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Block $Block)
  {
    $this->data = $request->input();
    if ($this->validator()->fails()) return $this->backErr();

    $Block->update($this->data);

    if ($request->hasFile('avatar')) {

      $Block->storeAvatar($request->avatar);
    }
    return redirect()->back()->with('toastr', [
      'status' => 'success', 'message' => 'Record updated!'
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Block  $Block
   * @return \Illuminate\Http\Response
   */
  public function destroy(Block $Block)
  {
    $Block->delete();
    return redirect()->back()->with('toastr', [
      'status' => 'success', 'message' => 'Record deleted!'
    ]);
  }
}
