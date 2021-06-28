@section('title')
<div class="content-header-left col-md-6 col-xs-12 mb-1">
  <h3 class="content-header-title">
    {{ Theme::title("freelancer") }}

  </h3>
</div>
@endsection

@section('content')
<div class="card">
  <div class="card-block">
   
    <x-freelancer.table :query="$query" />
  </div>
</div>
@endsection
@push('outer')
<x-modal class="modal-xl h-100 mt-0 p-0" id="modal-src">

</x-modal>
@endpush
<x-layout.back />