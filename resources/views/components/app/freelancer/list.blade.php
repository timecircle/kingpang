@props([
'freelancers',
'token',
])

@foreach($freelancers->chunk(2) as $chunk)
<div class="row match-height mb-2">
    @foreach($chunk as $item)
    <div class="col-xs-6">
        <x-app.freelancer.item :freelancer="$item" route="{{route('app.freelancer',$item)}}" />
    </div>
    @endforeach
</div>
@endforeach