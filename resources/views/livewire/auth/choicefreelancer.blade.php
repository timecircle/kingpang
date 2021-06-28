<div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-road2"></i> {{Str::title(__('choice user')) }} :</h4>

    </div>
  <div class="modal-body">
    <div class="row">
    <div class="col-xs-8">
      <div class="input-group">
          <input type="search" placeholder="{{__('Search email')}}"  wire:model="search" class="form-control" autofocus  placeholder="email">

       </div>
    </div>
    </div>
    <div class="card-block">
        @foreach($list->chunk(3) as $ch)
          <div class="row">
            @foreach( $ch as $item )

              <label onclick="{{$call}}(['{{$item->id}}','{{$item->email}}'])"
                 class="display-inline-block custom-control custom-radio">
                      <input type="radio" name="user-email" class="custom-control-input">
                      <span class="bg-success custom-control-indicator"></span>
                      <span class="custom-control-description">{{$item->email}}</span>
                    </label>


            @endforeach
          </div>
        @endforeach
    </div>
  </div>
</div>
