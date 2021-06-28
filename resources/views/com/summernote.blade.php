@php
    $id   = uniqid('note_');
    $mode = empty($mode) ? 'guest' : $mode;
@endphp

@push('script')
  <script>
    $('#{{$id}}').summernote({
      height: 280,                 // set editor height
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      placeholder: '{{ empty($placeholder) ? '' : $placeholder }}',
      toolbar: [
               // [groupName, [list of button]]
          @if($mode == 'editor')
               ['insert', ['link', 'picture', 'video']],
          @endif     
               ['style', ['bold', 'italic', 'underline', 'clear']],
               ['font', ['strikethrough', 'superscript', 'subscript']],
               ['fontsize', ['fontsize']],
               ['color', ['color']],
               ['para', ['ul', 'ol', 'paragraph']],
               ['height', ['height']]
             ],
     popover: {
         image: [
           ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
           ['float', ['floatLeft', 'floatRight', 'floatNone']],
           ['remove', ['removeMedia']]
         ],
       }
    });
  </script>
@endpush
<textarea id="{{$id}}" name="{{ empty($name) ? 'content' : $name}}">{{ empty($value) ? '' : $value}}</textarea>
