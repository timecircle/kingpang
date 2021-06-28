@extends('page.inc.master')

@section('content')


<div class="container ">
  <div class="content-header">
    <h2 class="text-bold-400">
      {{ Theme::title($Post->name)  }}
    </h2>
  </div>

  <div class="content-body">
    {!! $Post->content !!}
  </div>
</div>
@endsection
