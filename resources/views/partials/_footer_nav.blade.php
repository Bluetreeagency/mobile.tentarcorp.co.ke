<div class="appBottomMenu">
   <a href="{!! route('dashboard.page') !!}" class="item">
      <div class="col">
         <i class="fal fa-home-alt fa-2x"></i>
         <strong>Home</strong>
      </div>
   </a>
   <a href="{!! route('loan.index') !!}" class="item">
      <div class="col">
      <i class="fal fa-sack-dollar fa-2x"></i>
         <strong>My Loans</strong>
      </div>
   </a>
   <a href="#" class="item">
      <div class="col">
         <i class="fal fa-handshake fa-2x"></i>
         <strong>Invites</strong>
      </div>
   </a>
   <a href="{!! route('profile.page') !!}" class="item">
      <div class="col">
      <i class="fal fa-user fa-2x"></i>
         <strong>Profile</strong>
      </div>
   </a>
   <a href="{!! url('logout') !!}" class="item">
      <div class="col">
         <i class="fal fa-sign-out-alt fa-2x"></i>
         <strong>Logout</strong>
      </div>
   </a>
</div>
