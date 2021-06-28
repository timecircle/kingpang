@props([
'freelancer',
'route'
])

<div class="card shadow box-round">

    <x-app.open style="height:8rem;overflow:hidden" route="{{$route}}">
        @if($freelancer->avatar)

        <img class="img-fluid img-top" loading="lazy" src="{{ url($freelancer->avatar->src) }}">

        @endif
    </x-app.open>
    <x-app.open route="{{$route}}" class="card-body p-1">
        <p class="font-medium-2 primary text-bold-600">{{$freelancer->name}}</p>
        <p>{{$freelancer->job}}</p>
    </x-app.open>
</div>