

@section('body')
<x-block>
<x-product.edit :freelancer="$freelancer" root="{{$category}}"  />
</x-block>

@endsection

<x-layout.wiget />