<!-- App Header -->
<div class="appHeader bg-primary text-light">
   <div class="left">
      <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
         <ion-icon name="menu-outline"></ion-icon>
      </a>
   </div>
   <div class="pageTitle">
      <img src="assets/img/logo.jpg" alt="logo" class="logo">
   </div>
   <div class="right">

      <a href="{!! route('profile.page') !!}" class="headerButton">
         @if(Auth::user()->avatar)
            <img src="{!! asset('account/'.Auth::user()->user_code.'/documents/'.Auth::user()->avatar) !!}" alt="{!! Auth::user()->first_name.' '.Auth::user()->last_name !!}" class="imaged w32">
         @else
            <img src="https://ui-avatars.com/api/?name={!! Auth::user()->first_name.' '.Auth::user()->last_name !!}&rounded=true&size=40" alt="{!! Auth::user()->first_name.' '.Auth::user()->last_name !!}" class="imaged w32">
         @endif
         <div class="badge badge-danger">0</div>
      </a>
   </div>
</div>
