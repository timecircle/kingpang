@props(['category'])
@push('css')
  <style>
    .ph{
      padding-top: 6rem;
    }
  </style>
@endpush
@section('body')
  <x-layout.inc.header.pay />
  <div class="content-wrapper ph">
    @yield('content')
  </div>
@endsection
@section('footer')
  <x-layout.inc.footer />
@endsection

@push('outer')
  <x-layout.inc.outer />
@endpush
<x-layout.simple />
