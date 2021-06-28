<div class="bg-white pt-6">
  <div class="app-width card  ontop fixed yt-0">

      <div class="card-header">

          <div class="col-xs-9">
            <fieldset class="form-group row position-relative has-icon-left">
              <input type="text" name="search" autofocus
                placeholder="{{ Theme::title('what are you looking for?') }}"
               class="form-control round" >
                <div class="form-control-position">
                  <i class="ft-search  primary font-medium-4"></i>
                </div>
              </fieldset>
            </div>
            <div class="col-xs-3">
              <div class="row  float-xs-right">
                <button data-dismiss="modal" class="btn btn-block round"
                type="button">{{Theme::title('cancel')}}</button>
              </div>  
            </div>

      </div>
  </div>

  <div class="content-wrapper bg-white p-1 mt-2">

      @include('app.inc.recommendService')

  </div>

</div>
