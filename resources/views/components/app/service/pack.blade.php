@props([
'service',

])


<div class="text-xs-center mb-2">
    <h2 class="primary text-bold-600">{{$service->price_format}} </h2>
</div>
<div class="mb-2">
    {!! $service->description !!}
</div>
<div class="row font-medium-1">

    <label class="col-md-6">
        <i class="icon-calendar mr-1"></i> {{Str::title(__('delivery'))}}</label>
    <span> {{ $service->delivery_format }}</span>
</div>
<div class="row font-medium-1">
    <label class="col-md-6"> <i class="icon-wrench mr-1"></i> {{Theme::title('revisions')}} </label>
    <span> {{ $service->revisions_format }} </span>
</div>


<div class="app-w ontop left-0 p-1 fixed line-top bg-white x-0 yb-0">
    <x-app.sendmess :freelancer="$service->freelancer" />

    @auth
    <button type="button" data-toggle="modal" data-target="#cart-{{$service->id}}" class="btn btn-sm btn-primary round pull-right ">
        <span class="font-medium-2 text-bold-600"> {{ Theme::title($service->pack) }} - {{ $service->price_format }}</span>
    </button>
    @else
    <button type="button" data-toggle="modal" data-target="#modal-login" class="btn btn-sm btn-primary round pull-right ">
        <span class="font-medium-2 text-bold-600"> {{ Theme::title($service->pack) }} - {{ $service->price_format }}</span>
    </button>
    @endauth
</div>

@push('outer')
<x-modal id="cart-{{$service->id}}">
    <div class="app-w card">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">
                {{Theme::title('order preview')}}
            </h4>
        </div>
        <div class="modal-body">
            <livewire:cart.quick :product="$service"  />
        </div>
    </div>
</x-modal>
@endpush