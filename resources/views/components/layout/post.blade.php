@props(['category'])
@php 
$banner = App\Models\Block::pull('banner.blog')->orderByDesc('priority')->first();

@endphp
@push('css')
  <style>
    .ph{
      padding-top: 6rem;
    }
  </style>
@endpush
@section('body')
<x-block class="container-fluid bg-white sticky-wrapper line-b" >
  <x-layout.inc.header.post :category="$category" />
</x-block>  

  <div class="container">
    @if(isset( $banner->avatar))
    <a href="{{ isset($banner->link) ? url($banner->link) : '#' }}">
      <img src="{{ asset($banner->avatar->src) }}" class="img-fluid"/>
    </a>  
    @endif
  </div>
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
<x-layout.simple class="bg-white" />
