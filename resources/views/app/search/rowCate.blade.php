<div class="row p-1 line-top" onclick="if_src('{{ route('app.category',[$token,$item]) }}')" >

  <h6>{{ $item->name }}</h6>
  <p>{{ $item->description }}</p>

</div>
