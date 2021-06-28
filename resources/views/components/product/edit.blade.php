@props([
'product' => new App\Models\Product,
'freelancer' => null,
'root'  =>  0,
])
@php

$action = empty($product->id) ? route('freelancers.products.store',$freelancer) : route('products.update',$product) ;
$method = empty($product->id) ? 'PUT' : 'POST';
$title = empty($product->id) ? 'create service' : 'edit service';

if($product->category)
{
$road = $product->category->road();
$root = (count($road) == 1 ) ? $road[0]->id : end($road)->id;
}



@endphp

@once
@push('script')
<script>
  function opack(e) {
    $(e).closest('.card').children('.card-body').collapse('toggle');
  }
</script>
@endpush
@endonce
<x-form class="form" action="{{ $action }}" enctype="multipart/form-data" method="{{$method}}">
  <div style="z-index: 99; top:0" class="fixed block ">
    <div class="row bg-white line-b p-1">
      <div class="col-md-6">
        <h2 class="content-title">
          {{Theme::title($title)}}
        </h2>
      </div>
      <div class="col-md-6">
        <div class="pull-right">
          <button id="btn_send" type="submit" class="btn btn-primary">
            {{Theme::title('save')}}
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
        <input type="text" placeholder="{{__('title')}}" class="form-control input-lg" value=" {{ $product->name }}" name="name" />
        @if($product->id)
          <div> {{$product->link->pretty}} </div>
        @endif
      </div>
      <div class="form-group card">
        <x-editor mode="editor">{!!$product->content!!}</x-editor>
      </div>

      <div class="card">
        <div id="price" class="card-header">
          <h2 class="card-title"> {{__('standard price')}} :</h2>
        </div>
        <div class="card-body">
          <x-product.pack :product="$product" />

        </div>
      </div>

      @foreach( config('dev.packs') as $p)
      @php
      $pack = $product->getPacks()->wherePack($p)->first();
      @endphp
      <div class="card">
        <div id="price" class="card-header">
          <h2 class="card-title"> {{__("$p price")}} : </h2>
          <div class="heading-elements">
            <input onclick="opack(this)" {{ empty($pack)?'':'checked' }} type="checkbox" name="extend[]" value="{{$p}}" />
          </div>
        </div>
        <div class="card-body  {{ empty($pack)?'':'in' }} collapse">
          <x-product.pack :product="$pack" />
        </div>
      </div>
      @endforeach
    </div>

    <div class="col-md-4">
      <div class="card box">
        <div class="card-block">
          <div class="row">
            <label class="col-xs-4 font-medium-2"> Status :</label>
            <div class="col-xs-8">
              <x-select.status />

            </div>

          </div>
        </div>
      </div>
      <div class="card box">
        <div class="card-header">
          <h4 class="card-title">{{ Theme::title('avatar') }}</h4>
          <div class="heading-elements">
            <a data-action="collapse"><i class="ft-minus"></i></a>
          </div>
        </div>

        <div class="card-body collapse in text-xs-center">
          @if(empty($product->avatar))
          <x-temp class="img-fluid" style="height:120px" />
          @else
          {{$product->avatar->src}}
          <x-temp class="img-fluid" src="{{ asset($product->avatar->src) }}" style="height:120px" />
          @endif

        </div>
      </div>

      <div class="card">
        <div class="card-block ">
          <div class="form-group">
            <div class="font-medium-2 mb-1">{{Theme::title('category') }} :
            
            <span class="tag tag-pill tag-info pull-right">
              {{ App\Models\Category::find($root)->name ?? '::' }}
            </span>
            </div>
            <x-select.categories 
            class="btn font-medium-1 block btn-sm btn-outline-info "
            root="{{$root}}" id="categories" selected="{{ $product->category ? $product->category->id : 0 }}" prefix="product" />
          </div>

        </div>

      </div>


    </div>

  </div>

</x-form>