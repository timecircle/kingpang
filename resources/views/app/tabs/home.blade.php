<x-block class="section mb-3 ">
  <div class="top-round">
    <div class="slide col-xs-12">

      <img class="w-100 shadow" style="border-radius: 1rem;" loading="lazy" src="{{ $srcSlide }}">

    </div>

  </div>
  <div class="market">

    <x-app.market :market="$market" />

  </div>
</x-block>

<x-block class="section mb-3">
  <div class="card-header">
    <h2 class="card-title">{{ Theme::title('recommended service') }}</h2>
  </div>

  <div class="p-2">
    <x-app.service.list :services="$recommendService" token="{{$token}}" />

  </div>
</x-block>

<x-block class="section mb-3">
  <div class="card-header">
    <h2 class="card-title">{{ Theme::title('recommended freelancer') }}</h2>
  </div>
  <div class="p-2">

    <x-app.freelancer.list :freelancers="$recommendFreelancer" />
  </div>
</x-block>

<x-block class="app-w card p-1 line-bot fixed yt-0 text-xs-center">
  <img loading="lazy" src="{{asset('theme/images/logo/logo.png')}}">
</x-block>