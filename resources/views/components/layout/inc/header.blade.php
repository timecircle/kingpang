<div class="container-fluid p-2">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-xs-5">
            <x-logo class="logo" />
          </div>
          <div class="col-xs-7 ">
            <fieldset class="position-relative">
              <input type="text" class="form-control input-sm p-1 " placeholder="Website Developer">
              <div class="form-control-position">
                <i class="ft-search danger "></i>
              </div>
            </fieldset>

          </div>
        </div>
      </div>
      <div class="col-md-6">

        <div class="float-xs-right">
          <x-menu.top :user="Auth::user()" />
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid line-t line-b">
  <div class="container">
    <x-menu.service />
  </div>
</div>