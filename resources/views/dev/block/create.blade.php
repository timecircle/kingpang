
 <div class="modal-content">
  <x-form action="{{ route('blocks.store') }}" method="POST"  enctype="multipart/form-data">
    <div class="modal-header">
     

      <h4 class="pull-left" id="myModalLabel2"><i class="fa fa-road2"></i>Create</h4>

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
            
            <x-temp class="img-fluid" />
            </div>
          </div>
          <div class="col-xs-8">
            <div class="form-group">
              <input type="text" value="{{ old('title') }}" class="form-control" placeholder="title" name="title" />
            </div>

            <div class="form-group">
              <div class="input-group ">
                <span class="input-group-addon">Link</span>
                <input type="text" name="link" placeholder="link" class="form-control" value="{{ old('link') }}" aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="form-group row">
              <div class=" col-xs-6">
                <input type="text" value="{{ old('code') }}" class="form-control" placeholder="code" name="code" />
              </div>
              <div class="col-xs-6">
                <div class="input-group ">
                  <span class="input-group-addon">Priority</span>
                  <input type="number" name="priority" class="form-control" value="{{ old('priorty')  }}">
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="form-group">
          <x-editor height="120">{{old('content')}}</x-editor>
        </div>

      </div>

    </div>
   
  </x-form>
</div>