<div class="appHeader">
   <div class="left">
      <a href="{{ url()->previous() }}" class="headerButton">
         <ion-icon name="chevron-back-outline"></ion-icon>
      </a>
   </div>
   <div class="pageTitle">@yield('title')</div>
   <div class="right">
      <a href="#" class="headerButton">
         <ion-icon name="notifications-outline"></ion-icon>
         <div class="badge badge-danger">0</div>
      </a>
   </div>
</div>
