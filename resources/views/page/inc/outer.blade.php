
@include('page.inc.modal.iframe')
@include('page.inc.modal.login')
@include('page.inc.modal.register')

@stack('outer')
@livewireScripts
<x-script/>
<script src="{{asset('theme/js/me.js')}}" ></script>
<script src="{{asset('theme/js/firebase.js')}}" ></script>
<script src="{{asset('theme/js/app.js')}}" ></script>

@stack('script')
