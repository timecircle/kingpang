@props([
'list',
'value'=>'name',
'key'=>'id',
'choices' => []
])
<select {{ $attributes->merge( ['class' => 'select2 '] ) }} multiple="multiple">
  @foreach($list as $item)
  <option {{ in_array($item->$key,$choices) ? 'selected' : '' }} value="{{$item->$key}}">{{$item->$value}}</option>
  @endforeach

</select>
@once
@push('script')
<script>
  $(".select2").select2();
</script>
@endpush

@endonce