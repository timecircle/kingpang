@section('title')

<div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h3 class="content-header-title">
        {{ Theme::title("category") }}

    </h3>


</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
    <div class="breadcrumb-wrapper col-xs-12">
        @if($item)
            <ol class="breadcrumb">
                
                @foreach($item->road() as $i )
                    <li class="breadcrumb-item">
                        <a href="{{ route('categories.index',['id' => $i->id]) }}" >
                        {{ $i->name }}
                        </a>
                    </li>
                @endforeach
                <li class="breadcrumb-item">
                    {{ $item->name }}
                </li>
            </ol>
        @endif
    </div>
</div>
@endsection

@section('content')
<div class="content-body">
    <div class="card">
        <div class="card-block">
            <x-category.table :list="$list" :item="$item" prefix="{{$prefix}}" />
        </div>
    </div>
    @endsection

    <x-layout.back />