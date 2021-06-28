@props(['title','id'])

@push('script')
<script src="{{asset('theme/js/app-menu.min.js')}}"></script>
<script src="{{asset('theme/js/app.js')}}"></script>
@endpush
<x-layout.simple />