<div class="content-wrapper mb-2">
  <form action="{{ route('app.cart.add',[$token,$pack]) }}" method="POST" >
    @csrf
    <div class="text-xs-center mb-2">
        <h2 class="primary text-bold-600">{{$pack->price_format}} </h2>
    </div>
    <div class="mb-2">
    {!! $pack->description !!}
  </div>
    <div class="row font-medium-1">

        <label class="col-md-6">
          <i class="icon-calendar mr-1"></i> {{Str::title(__('delivery'))}}</label>
        <span>  {{ $pack->delivery_format }}</span>
    </div>
    <div class="row font-medium-1">
        <label class="col-md-6"> <i class="icon-wrench mr-1"></i> {{Str::title(__('revisions'))}} </label>
          <span> {{ $pack->revisions_format }} </span>
    </div>


    <div class="app-width ontop p-1 fixed line-top bg-white left-0 yb-0">

      <label id="label-messenger" data-toggle="modal" data-target="#type-messenger"
       class="text-muted ">
        {{Theme::title('type a messsge...')}}
      </label>

      <button type="submit" class="btn btn-sm btn-primary round pull-right ">
        {{Theme::title('continue')}} <span class="font-medium-3 text-bold-600"> {{ $pack->price_format }}</span>
      </button>

    </div>


  </form>

</div>
