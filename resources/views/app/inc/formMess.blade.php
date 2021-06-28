
<form class="form  card"
enctype="multipart/form-data" method="post">
@csrf
<input type="hidden" name="freelancer_id" value="{{$freelancer->id}}" />


			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel2">
          {{Theme::title('messenger')}}</h4>
			</div>
		  <div class="modal-body">
        <div class="form-group">
        <div class="media profil-cover-details pull-left">
            <label class="profile-image mr-1">
                <img src="{{$avatar}}" class="rounded-circle img-border rect" alt="{{$freelancer->name}}">
            </label>
          </div>


          <div class="ml-1">
            <div class="font-medium-3">
              {{__($freelancer->name)}}
            </div>
            <div>
              {{__($freelancer->job)}}
            </div>
          </div>
        </div>
          <div class="form-group">
              <textarea id="messenger" name="contact" class="form-control"></textarea>
          </div>
		  </div>
		  <div class="modal-footer">
          <div class="pull-left">
            <fieldset class="form-group position-relative has-icon-left">
              <label class="form-control round">
                  {{Theme::title('attach file')}}

                  <input type="file"  name="avatar" class="none" >
              </label>
              <div class="form-control-position">
                    <i class="ft-file primary font-medium-4"></i>
                </div>
            </fieldset>
        </div>
        <div class="pull-right">
    			<button type="submit" class="btn btn-primary">
            {{Theme::title('send')}}</button>
            </div>
		  </div>
</form>
