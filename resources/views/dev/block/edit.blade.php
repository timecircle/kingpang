<div class="modal-content">
  <x-form action="{{ route('blocks.update',$row) }}" method="PUT" enctype="multipart/form-data">
    <div class="modal-header">
     

      <h4 class="pull-left" id="myModalLabel2"><i class="fa fa-road2"></i>Edit</h4>

      <div class="pull-right">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
    <div class="modal-body h-100">
      <div class="card-block">
        <div class="row">
          <div class="col-xs-4">
            <div class="card box">
            
              @if(empty($row->avatar))
              <x-temp class="img-fluid" />
              @else
              <x-temp class="img-fluid" src="{{$row->avatar->src}}" />
              @endif
            </div>
          </div>
          <div class="col-xs-8">
            <div class="form-group">
              <input type="text" value="{{ $row->title }}" class="form-control" placeholder="title" name="title" />
            </div>

            <div class="form-group">
              <div class="input-group ">
                <span class="input-group-addon">Link</span>
                <input type="text" name="link" placeholder="link" class="form-control" value="{{ $row->link }}" aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="form-group row">
              <div class=" col-xs-6">
                <input type="text" value="{{ $row->code }}" class="form-control" placeholder="type" name="code" />
              </div>
              <div class="col-xs-6">
                <div class="input-group ">
                  <span class="input-group-addon">Priority</span>
                  <input type="number" name="priority" class="form-control" value="{{ $row->priority   }}">
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="form-group">
          <x-editor height="120">{{$row->content}}</x-editor>
        </div>

      </div>

    </div>
   
  </x-form>
</div>