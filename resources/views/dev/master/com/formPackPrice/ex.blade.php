<label class="custom-control custom-checkbox">
    <input id="{{$id}}_{{$out}}" type="checkbox"
      {{$check}} name="extends[]"
      value="{{ $out }}"
      class="custom-control-input">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description">
    {{ __($out) }}</span>
</label>
@push('script')
  <script>
    display =  $('#{{$id}}_{{$out}}').prop( "checked");
    if ( display === true ) {
       $('.{{$id}}_{{$out}}').show();
    }else{
       $('.{{$id}}_{{$out}}').hide();
    }

    $('#{{$id}}_{{$out}}').click(function(){
         $('.{{$id}}_{{$out}}').toggle();
    })
  </script>
@endpush
