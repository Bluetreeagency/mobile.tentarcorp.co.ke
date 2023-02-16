<!-- ========= JS Files =========  -->
<!-- Bootstrap -->
<script src="{!! asset('assets/js/plugins/jquery/jquery-3.2.1.min.js') !!}"></script>
<script src="{!! asset('assets/js/lib/bootstrap.bundle.min.js') !!}"></script>
<!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<!-- Base Js File -->
{{-- <script src="{!! asset('assets/js/base.js') !!}"></script> --}}

<!-- select 2 -->
<link href="{!! asset('assets/js/plugins/select2/dist/css/select2.min.css') !!}" rel="stylesheet" />
<script src="{!! asset('assets/js/plugins/select2/dist/js/select2.min.js') !!}"></script>
<script>
   $('.select2').select2({
      width: '100%',
      allowClear: true,
   });
</script>

<!-- ================== toastr ================== -->
<link href="{!! asset('assets/js/plugins/toastr/build/toastr.css') !!}" rel="stylesheet"/>
<script src="{!! asset('assets/js/plugins/toastr/build/toastr.min.js') !!}"></script>
@if(Session::has('success'))
   <script>
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
      toastr.success('{!! Session::get('success') !!}');
   </script>
@endif

@if(Session::has('error'))
   <script>
		toastr.options =
		{
			"closeButton": true,
			"progressBar" : true
		}
      toastr.error('{!! Session::get('error') !!}');
   </script>
@endif

@if(Session::has('warning'))
   <script>
		toastr.options =
		{
			"closeButton": true,
         //"duration": 1,
         "stopOnFocus": true,
			//"progressBar" : true
		}
      toastr.warning('{!! Session::get('warning') !!}');
   </script>
@endif

<!-- Splide -->
<script src="{!! asset('assets/js/plugins/splide/splide.min.js') !!}"></script>
<script>
   new Splide( '.splide' ).mount();
</script>
