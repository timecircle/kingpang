<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('meta')
    <title>@yield('page-title', 'KING PANG')</title>
    <!-- Fonts -->
    @livewireStyles
    {{Theme::css([
        'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap',
        url('vendor/me/css/bootstrap.min.css'),
        url('vendor/me/css/bootstrap-extended.min.css'),
        url('vendor/me/fonts/feather/style.min.css'),
        url('vendor/me/fonts/font-awesome/css/font-awesome.min.css'),
        url('vendor/me/fonts/flag-icon-css/css/flag-icon.min.css'),
        url('vendor/me/fonts/simple-line-icons/style.min.css'),

        url('vendor/me/inc/css/pickers/daterange/daterangepicker.css'),
        url('vendor/me/inc/css/pickers/datetime/bootstrap-datetimepicker.css'),
        url('vendor/me/inc/css/pickers/pickadate/pickadate.css'),

        url('vendor/me/inc/css/extensions/pace.css'),
        url('vendor/me/inc/css/extensions/toastr.css'),
        url('vendor/me/inc/css/summernote/summernote.css'),
        url('vendor/me/inc/css/forms/selects/select2.min.css'),


        url('vendor/me/css/colors.min.css'),
        url('vendor/me/css/core/menu/menu-types/vertical-menu.min.css'),
        url('vendor/me/css/core/menu/menu-types/vertical-overlay-menu.min.css'),
        url('vendor/me/css-rtl/custom-rtl.min.css'),
        url('vendor/me/css/app.min.css'),
        url('vendor/me/css/admin.css'),
    ])}}
    @stack('css')
    <!-- Styles -->
</head>
