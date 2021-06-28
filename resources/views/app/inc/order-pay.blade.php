@php
  $content  = "#$user->id $freelancer->id $product";
@endphp
<form class="form  card" action="{{route('app.cart.pay',[$token,$product])}}"
enctype="multipart/form-data" method="post">
@csrf
<input type="hidden" name="freelancer_id" value="{{$freelancer->id}}" />
<input type="hidden" name="user_id" value="{{$user->id}}" />

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel2">
          <i class="fa fa-road2"></i>{{Theme::title('payment method')}}</h4>
			</div>
		  <div class="modal-body">
        <h4 class="font-medium-2 text-bold-600">
            CÔNG TY TNHH MTV LATH GROUP LATH GROUP COMPANY LIMITED
        </h4>

        <div class="p-1">
          <div class="row">
            <label class="col-xs-6">
                TMCP Kỹ thương Việt Nam (Techcombank):
            </label>
            <div class="col-xs-6">
                <span class="font-medium-2 primary text-bold-600">
                  19036801918021 (VNĐ) </span>
            </div>
          </div>
          <div class="row">
            <label class="col-xs-6">{{Theme::title('transfer content')}} :</label>
            <div class="col-xs-6">

              <input type="text" disabled class="btn btn-sm btn-info" value="{{$content}}">

                <small class="pull-right">{{__('Please submit the correct content')}}</small>

            </div>
          </div>
        </div>
        <div class="clear p-1">
          <fieldset class="form-group position-relative has-icon-left">
            <label class="form-control round">
                {{Theme::title('attach a bank statement')}}

                <input type="file" accept="image/*" name="avatar" class="none" >
            </label>
            <div class="form-control-position">
                  <i class="ft-image primary font-medium-4"></i>
              </div>
          </fieldset>
      </div>
		  </div>
		  <div class="modal-footer">
  			<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">
          {{Theme::title('cancel')}}
        </button>
  			<button type="submit" class="btn btn-primary">
          {{Theme::title('send')}}</button>
		  </div>
</form>
