<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Hash;

class UserController extends DevController
{
  protected $reg  = [
    'name' => ['required', 'string', 'max:191'],
    'email' => ['required', 'string', 'email', 'max:191'],
  ];
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $query  = User::OrderByDesc('created_at');
    if( request('is') == 'admin'){
      $query->whereIsAdmin(true);
    }
    return view('dev.user.index',compact('query'));
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
    $this->reg['password'] = ['required', 'string', 'min:6', 'confirmed'];
    $this->reg['email'][]  = 'unique:users';

    if ($this->validator()->fails()) return $this->backErr();
    $this->data['password'] = Hash::make($request->password);
    $user  =  User::create($this->data);
    return redirect()->back()->with('toastr', [
      'status' => 'success', 'message' => 'Account created!'
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    return view('dev.user.edit', compact('user'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
    $this->data = $request->input();
    if ($this->data['password']) {
      $this->reg['password'] = ['required', 'string', 'min:6', 'confirmed'];
    } else {
      unset($this->data['password']);
    }
    if ($this->validator()->fails()) return $this->backErr();

    $user->update($this->data);
    return redirect()->back()->with('toastr', [
      'status' => 'success', 'message' => 'Record updated!'
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->back()->with('toastr', [
      'status' => 'success', 'message' => 'Record deleted!'
    ]);
  }
}
