@if (count($errors) > 0)
   <div id="notification-16" class="notification-box">
      <div class="notification-dialog ios-style bg-danger">
         <div class="notification-header">
            <div class="in"></div>
            <div class="right">
               <a href="#" class="close-button">
                  <ion-icon name="close-circle"></ion-icon>
               </a>
            </div>
         </div>
         <div class="notification-content">
            <div class="in">
               <h3 class="subtitle">Errors!</h3>
               <div class="text">
                  <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
@endif


@if(Session::has('warning'))
   <div id="notification-17" class="notification-box">
      <div class="notification-dialog ios-style bg-warning">
         <div class="notification-header">
            <div class="in">
            </div>
            <div class="right">
               <a href="#" class="close-button">
                  <ion-icon name="close-circle"></ion-icon>
               </a>
            </div>
         </div>
         <div class="notification-content">
            <div class="in">
               <h3 class="subtitle">Warning !!</h3>
               <div class="text">
                  {!! Session::get('warning') !!}
               </div>
            </div>
         </div>
      </div>
   </div>
@endif
