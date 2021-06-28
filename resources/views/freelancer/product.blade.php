@extends('freelancer.master.index')
@section('title')
<h4>{{ Str::title(__("product")) }}</h4>
@endsection
@section('content')
<div class="card">
  <div class="card-block">
@include('dev.product.list',[
      'list' => $list,
      'freelancer' => $freelancer,
      'cols' => ['type','category','name','created_at','price','status']
  ])
</div>

</div>
@endsection
