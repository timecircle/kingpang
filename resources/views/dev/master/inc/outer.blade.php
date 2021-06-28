<div class="modal fade" id="modal-if"
  tabindex="-1" role="dialog">
  <div id="if-content" style="display:none" class=" modal-xl bg-gray-100 h-100">


  </div>
</div>

@stack('outer')
{{  Theme::js([
      url('vendor/me/inc/js/vendors.min.js'),
      url('vendor/me/inc/js/summernote/summernote.js'),
      url('vendor/me/inc/js/extensions/toastr.min.js'),
      url('vendor/me/inc/js/pickers/dateTime//moment-with-locales.min.js'),
      url('vendor/me/inc/js/pickers/dateTime/bootstrap-datetimepicker.min.js'),
      url('vendor/me/inc/js/pickers/pickadate/picker.js'),
      url('vendor/me/inc/js/pickers/pickadate/picker.date.js'),
      url('vendor/me/inc/js/pickers/pickadate/picker.time.js'),

      url('vendor/me/inc/js/forms/select/select2.full.min.js'),

      url('vendor/me/js/core/app-menu.min.js'),
      url('vendor/me/js/core/me.js'),
      url('vendor/me/js/core/app.js'),
      url('vendor/me/js/scripts/forms/select/form-select2.js'),

  ])
}}
{{  Theme::toastr() }}

@livewireScripts

@stack('script')
