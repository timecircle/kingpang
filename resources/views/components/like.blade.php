@props([
'prefix' => 'post',
'id'
])

@php
$func = "dolike('$prefix',$id )" ;
@endphp

@auth
<span {{$attributes}} onclick="{{$func}}">
  <i class="ft ft-heart"></i>
</span>

@once
@push('script')
<script>
  function dolike(prefix, id) {
    $.ajax({
      data: {
        'alias': prefix,
        'id': id,
        '_token': "{{ csrf_token() }}",
      },
      type: "POST",
      url: "{{ route('liked',Auth::user()) }}",
      cache: false,
      processData: false,

      success: function(liked) {
        if (liked) {
          $(this).addClass('bg-red');
        } else {
          $(this).removeClass('bg-red');
        }
        console.log(status + ': ' + liked);
      },
      error: function(xhr, status, error) {
        console.log(status + ': ' + error);
      }
    });
  }
</script>
@endpush
@endonce
@else
<span {{$attributes}} data-toggle='modal' data-target='#modal-login'>
  <i class="ft ft-heart"></i>
</span>
@endif