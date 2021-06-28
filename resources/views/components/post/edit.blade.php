@props([
'post' => new App\Models\Post])
@php 
  $action = empty($post->id) ? route('posts.store') : route('posts.update',$post);
  $method = empty($post->id) ? 'POST' : 'PUT';
  $title  = empty($post->id) ? 'create content' : 'edit content';
@endphp
<x-form class="form" method="{{$method}}" enctype="multipart/form-data" action="{{ $action }}">
  <div style="z-index: 99; top:0" class="fixed block ">
    <div class="row bg-white line-b p-1">
      <div class="col-md-6">
        <h2 class="content-title">
          {{$title}}
        </h2>
      </div>
      <div class="col-md-6">
        <div class="pull-right">
          <button id="btn_send" type="submit" class="btn btn-primary">
            {{Theme::title('send')}}
          </button>
          <button type="button" class="btn btn-info" onclick="parent.location.reload();">
            <span aria-hidden="true"> X </span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <div style="padding-top: 6rem;" class="container form-body">



    <div class="col-md-8">
      <div class="form-group">
      
        <input type="text" placeholder="" class="form-control input-lg" value=" {{ $post->name }}" name="name" />
        @if($post->id)
          <div> {{$post->link->pretty}} </div>
        @endif
      </div>


      <div class="form-group card">
        <x-editor mode="editor">{!!$post->content!!}</x-editor>
      </div>


    </div>
    <div class="col-xs-4">
    <div class="box card p-1">
        <div class="row mb-1">
          <label class="col-xs-4 font-medium-2"> Code :</label>
          <div class="col-xs-8">
            <input class="form-control" name="code" value="{{ $post->code }}" />
          </div>
        </div>
        <div class="row">
          <label class="col-xs-4 font-medium-2"> Status :</label>
          <div class="col-xs-8">
            <x-select.status />

          </div>

        </div>
      </div>
      <div class="card box">
        <div class="card-header">
          <h4 class="card-title">{{ Theme::title('avatar') }}</h4>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
            </ul>
          </div>
        </div>

        <div class="card-body collapse in text-xs-center">
          @if(empty($Post->avatar))
          <x-temp class="img-fluid" style="height:120px" />
          @else
          {{$Post->avatar->src}}
          <x-temp class="img-fluid" src="{{ asset($Post->avatar->src) }}" style="height:120px" />
          @endif

        </div>
      </div>

      <div class="card box">
        <div class="card-header">
          <h4 class="card-title">{{ Theme::title('optimize seo') }}</h4>

          <div class="heading-elements">
            <a data-action="collapse"><i class="ft-minus"></i></a>
          </div>

        </div>
        <div class="card-body collapse">
          <div class="card-block">

            <div class="form-group row">
              <label class="label-control">{{ Theme::title('meta title') }} </label>
              <input class="form-control" name="meta_title" value="{{ $post->meta_title }}" />
            </div>
            <div class="form-group row">
              <label class="label-control">{{ Theme::title('meta keyword') }} </label>
              <input class="form-control" name="meta_title" value="{{ $post->meta_keyword }}" />
            </div>

            <div class="form-group row">
              <label class="label-control">{{ Theme::title('meta description') }} </label>
              <textarea class="form-control" name="meta description">{{ $post->meta_description }}</textarea>
            </div>
          </div>
        </div>
      </div>




      @if($post->parent_id)
      <div class="card box">

        <div class="card-block ">

          <div class="form-group">


            <div class="row">
              <span class="menu-title">{{ Theme::title('category') }} :</span>

              <label class="pull-right display-inline-block custom-control custom-radio">
                <input type="radio" checked name="category_id" value="{{ request('category') }}" class="custom-control-input">
                <span class="bg-success custom-control-indicator"></span>
                <span class="custom-control-description">
                  {{ Theme::title('no choice') }}
                </span>
              </label>


            </div>
            <div class="mt-1">
              @include('dev.master.com.treeCategories',[
              'selected' => $post->category_id
              ])
            </div>

          </div>

        </div>


      </div>
      @endif
      

    </div>

</x-form>