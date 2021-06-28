@props(['list',
'id',
'action',
'params' =>  [],
'cols'=>3])
<x-modal id="{{$id}}" {{ $attributes }}>
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-road2"></i>{{Theme::title('choices')}} : </h4>
    </div>
    <div class="modal-body">
      @foreach($list->chunk($cols) as $chunk)
      <div class="row mb-2">
        @foreach( $chunk as $category)
        @php
        $params['category']=$category->id;
        $create = route($action,$params);
       
        @endphp
        <div class="col-md-4">
          <button type="button" data-dismiss="modal" class="btn block" onclick="modal_src('modal-src','{{$create}}')">
            {{ $category->name }}
          </button>

        </div>
        @endforeach
      </div>
      @endforeach

    </div>
  </div>
</x-modal>