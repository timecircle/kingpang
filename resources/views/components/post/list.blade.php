@props([
'col' => 3,
'query',
'total'=> 6
])
@php
$posts = $query->paginate($total);
@endphp

@foreach($posts->chunk($col) as $chunk)
  <div class="row match-height mb-2">
      @foreach( $chunk as $post )
          <div class="col-md-{{ 12/$col }} col-xs-6" >
            <x-post.item :post="$post" />
          </div>
      @endforeach
  </div>
@endforeach
<div class="row float-xs-right">
  {{ $posts->render('vendor.pagination.simple')  }}
</div>