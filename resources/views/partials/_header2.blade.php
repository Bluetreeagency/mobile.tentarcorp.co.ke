<!-- App Header -->
<div class="appHeader bg-primary text-light">
   <div class="left">
      <a href="#" class="headerButton">
         <ion-icon class="icon" name="notifications-outline"></ion-icon>
         <span class="badge badge-danger">0</span>
      </a>
   </div>
   <div class="pageTitle">
      <img src="assets/img/logo.jpg" alt="logo" class="logo">
   </div>
   <div class="right">

      <a href="{!! route('profile.page') !!}" class="headerButton">
         <img src="https://ui-avatars.com/api/?name={!! Auth::user()->first_name.' '.Auth::user()->last_name !!}&rounded=true&size=40" alt="image" class="imaged w32">
         <span class="badge badge-danger">6</span>
      </a>
   </div>
</div>
