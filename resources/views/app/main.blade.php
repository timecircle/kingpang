@php
$srcSlide = asset('theme/images/app/slider/1.png');

$tabs ['home'] = [ 'icon'=>'ft ft-home', 'title' => Theme::title('home') ];
$tabs ['inbox'] = [ 'icon'=>'ft ft-inbox', 'title' => Theme::title('inbox')];
$tabs ['search'] = [ 'icon'=>'ft ft-search', 'title' => Theme::title('search') ];
$tabs ['notify'] = [ 'icon'=>'ft ft-bell', 'title' => Theme::title('notify') ];
$tabs ['account'] = [ 'icon'=>'ft ft-user', 'title' => Theme::title('account')];

$market = App\Models\Category::root()->wherePrefix('service')->OrderBy('priority','desc')->get();

@endphp
@push('css')
<style>
  .slide,
  .market {
    margin-top: 6rem;
  }
</style>
@endpush

@push('outer')
@foreach($market as $item)
<x-modal class="w-100 h-100 m-0" id="type-{{$item->id}}" tabindex="-1" role="dialog">
  <div class="app-w">

    @include('app.tabs.category')

  </div>
</x-modal>
@endforeach
@endpush

@section('content')

<div class="tab-content pb-tab">

  <div role="tabpanel" class="tab-pane app-w active" id="home" aria-expanded="true">
    @include('app.tabs.home')

  </div>

  <div role="tabpanel" class="tab-pane app-w" id="notify" aria-expanded="true">
    @include('app.tabs.notify')
  </div>
  <div role="tabpanel" class="tab-pane app-w" id="search" aria-expanded="true">
    @include('app.tabs.search')

  </div>


  <div role="tabpanel" class="tab-pane app-w" id="inbox" aria-expanded="true">
    @include('app.tabs.inbox')
  </div>

  <div role="tabpanel" class="tab-pane app-w" id="account" aria-expanded="true">
    @include('app.tabs.account')
  </div>


</div>

<x-block class="line-top app-w bg-white fixed yb-0">

  <x-app.nav :tabs="$tabs" />

</x-block>
@endsection

<x-layout.mobile />