@push('css')
<link href="{{asset('theme/css/home.css')}}" rel="stylesheet">
<style>
  .ph {
    padding-top: 10rem;
  }
</style>
@endpush
@section('body')
<x-block id="sticky-wrapper" class="bg-white sticky-wrapper line-b">
  <x-layout.inc.header />
</x-block>

<div class="content-wrapper ph">
<x-block class="container-fluid bound">
    <x-home.welcome />
  </x-block>

  <x-block class="container-fluid bound">
    <x-home.marketplace />
  </x-block>

  <x-block class="container-fluid bound tip">
    <x-home.popular />
  </x-block>

  <x-block class="container-fluid bound">
    <x-product.category code="service.makerting" limit='4' />
  </x-block>
  <x-block class="container-fluid bound">
    <x-product.category code="service.design" limit='4' />
  </x-block>

  <x-block class="container-fluid bound">
    <x-product.category code="service.develop" limit='4' />
  </x-block>
  <x-block class="container-fluid bound tip">
    <x-home.recommend />
  </x-block>
</div>
@endsection
@section('footer')
<x-layout.inc.footer />
@endsection
@push('outer')
<x-layout.inc.outer />
@endpush
<x-layout.simple class="bg-white" />