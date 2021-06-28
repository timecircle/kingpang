@props([
'services',
])

@foreach($services->chunk(2) as $chunk)
<div class="row match-height mb-2">
    @foreach($chunk as $item)
    <div class="col-xs-6">
        <x-app.service.item :service="$item" route="{{route('app.product',$item)}}" />
    </div>
    @endforeach
</div>
@endforeach