@push('css')
  <style>
    .ph{
      padding-top: 6rem;
    }
  </style>
@endpush
@section('body')
  <div class="content-wrapper ph">
    @yield('content')
  </div>
@endsection

@push('outer')
  <x-layout.inc.outer />
@endpush
<x-layout.simple />
