
<fieldset data-dismiss="modal" data-toggle="modal" data-target="#show-results"
class="form-group position-relative has-icon-left">

   <label class="form-control round">
     {{ Theme::title('what are you looking for?') }}
   </label>
    <div class="form-control-position">
      <i class="ft-search  primary font-medium-4"></i>
    </div>
</fieldset>
@push('outer')
  <div class="modal fade" id="show-results"
    tabindex="-1" role="dialog">
    <div class="app-content">
      @include('app.search.result')
    </div>
  </div>
@endpush
