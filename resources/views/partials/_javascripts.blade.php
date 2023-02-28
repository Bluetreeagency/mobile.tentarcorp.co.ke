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

<script src="{!! asset('assets/js/plugins/sweetalert/dist/sweetalert2.min.js') !!}"></script>
<script>
   const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      showCloseButton: true,
      timer: 5000,
      timerProgressBar:true,
      didOpen: (toast) => {
         toast.addEventListener('mouseenter', Swal.stopTimer)
         toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
   });

   window.addEventListener('alert',({detail:{type,message}})=>{
      Toast.fire({
         icon:type,
         title:message
      })
   })
</script>
@livewireScripts

<!-- Use as a Vanilla JS plugin -->
<script src="{!! asset('assets/js/plugins/intl-tel-input-master/build/js/intlTelInput.min.js') !!}"></script>
<script>
   var input = document.querySelector("#phone"),
      errorMsg = document.querySelector("#error-msg"),
      validMsg = document.querySelector("#valid-msg");
      submitBtn = document.querySelector("#submitForm");
      phoneValid = document.querySelector("#phone_valid");

   // Error messages based on the code returned from getValidationError
   var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

   // Initialise plugin
   var intl = window.intlTelInput(input, {
      initialCountry: "ke",
      nationalMode:false,
      geoIpLookup: function(success, failure) {
         $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
            success(countryCode);
         });
      },
      utilsScript: "{!! asset('assets/js/plugins/intl-tel-input-master/build/js/utils.js') !!}",
   });


   var reset = function() {
      input.classList.remove("error");
      errorMsg.innerHTML = "";
      errorMsg.classList.add("hide");
      validMsg.classList.add("hide");
      submitBtn.classList.add("hide");
      phoneValid.classList.add("hide");
   };

   // Validate on blur event
   input.addEventListener('blur', function() {
      reset();
      if(input.value.trim()){
         if(intl.isValidNumber()){
            validMsg.classList.remove("hide");
            submitBtn.classList.remove("hide");
            phoneValid.classList.add("hide");
         }else{
            input.classList.add("error");
            var errorCode = intl.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
            phoneValid.classList.remove("hide");
         }
      }
   });

   // Reset on keyup/change event
   input.addEventListener('change', reset);
   input.addEventListener('keyup', reset);

</script>
<script>
   function toggleBlur() {
      var div = document.getElementById("Blur");
      if (div.classList.contains("blurred")) {
         div.classList.remove("blurred");
      } else {
         div.classList.add("blurred");
      }
   }
</script>
<script>
   function toggleBlur2() {
      var div = document.getElementById("Blur2");
      if (div.classList.contains("blurred")) {
         div.classList.remove("blurred");
      } else {
         div.classList.add("blurred");
      }
   }
</script>
@yield('scripts')
<script type="text/javascript">
   $(document).ready(function(){
      $("form").on("submit", function(){
         $(".submit").hide();
         $(".submit-load").show();
      });//submit
   });//document ready
</script>
<script>
    $(".delete").on("click", function(){
        return confirm("Are you sure?");
    });
</script>
