 <!-- App Sidebar -->
 <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body p-0">
            <!-- profile box -->
            <div class="profileBox pt-2 pb-2">
               <div class="image-wrapper">
                  @if(Auth::user()->avatar)
                     <img src="{!! asset('account/'.Auth::user()->user_code.'/documents/'.Auth::user()->avatar) !!}" alt="{!! Auth::user()->first_name.' '.Auth::user()->last_name !!}" class="imaged w36">
                  @else
                     <img src="https://ui-avatars.com/api/?name={!! Auth::user()->first_name.' '.Auth::user()->last_name !!}&rounded=true&size=40" alt="{!! Auth::user()->first_name.' '.Auth::user()->last_name !!}" class="imaged w32">
                  @endif
               </div>
               <div class="in">
                  <strong>{!! Auth::user()->first_name.' '.Auth::user()->last_name !!}</strong>
                  <div class="text-muted">{!! Auth::user()->id_number !!}</div>
               </div>
               <a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                  <ion-icon name="close-outline"></ion-icon>
               </a>
            </div>
            <!-- * profile box -->
            <!-- balance -->
            <div class="sidebar-balance">
               <div class="listview-title text-white">Balance</div>
               <div class="in">
                  <div class="row">
                     <div class="col-10">
                        <h1 class="amount blurred" id="Blur2">ksh {!! number_format(Loan::userLoanBalance()) !!}</h1>
                     </div>
                     <div class="col-2">
                        <h1 class="amount" href="#"  onclick="toggleBlur2()"><i class="far fa-eye"></i></h1>
                     </div>
                  </div>
               </div>
            </div>
            <!-- * balance -->

            <!-- action group -->
            <div class="action-group">
               <a href="#" class="action-button" data-bs-toggle="modal" data-bs-target="#repayLoan">
                  <div class="in">
                     <div class="iconbox">
                        <i class="fal fa-usd-circle"></i>
                     </div>
                     Repay Loan
                  </div>
               </a>
               <a href="{!! route('loan.request') !!}" class="action-button">
                  <div class="in">
                     <div class="iconbox">
                        <i class="fal fa-hand-holding-usd"></i>
                     </div>
                     Request Loan
                  </div>
               </a>
               <a href="{!! route('loan.index') !!}" class="action-button">
                  <div class="in">
                     <div class="iconbox">
                        <i class="fal fa-receipt"></i>
                     </div>
                     Loan History
                  </div>
               </a>
            </div>
            <!-- * action group -->

            <!-- menu -->
            <div class="listview-title mt-1">Menu</div>
            <ul class="listview flush transparent no-line image-listview">
               <li>
                  <a href="{!! route('dashboard.page') !!}" class="item">
                     <div class="icon-box bg-primary">
                        <i class="fal fa-home-alt"></i>
                     </div>
                     <div class="in">
                        Home
                     </div>
                  </a>
               </li>
               <li>
                  <a href="{!! route('loan.index') !!}" class="item">
                     <div class="icon-box bg-primary">
                        <i class="fal fa-sack-dollar"></i>
                     </div>
                     <div class="in">
                        My Loans
                     </div>
                  </a>
               </li>
               <li>
                  <a href="#" class="item">
                     <div class="icon-box bg-primary">
                        <i class="fal fa-handshake"></i>
                     </div>
                     <div class="in">
                        Invites
                     </div>
                  </a>
               </li>
               <li>
                  <a href="{!! route('profile.page') !!}" class="item">
                     <div class="icon-box bg-primary">
                        <i class="fal fa-user"></i>
                     </div>
                     <div class="in">
                        Profile
                     </div>
                  </a>
               </li>
               {{-- <li>
                  <a href="{!! route('dashboard.page') !!}" class="item">
                     <div class="icon-box bg-primary">
                        <i class="fal fa-home-alt"></i>
                     </div>
                     <div class="in">
                        Notifications
                        <span class="badge badge-primary">10</span>
                     </div>
                  </a>
               </li> --}}
            </ul>
            <!-- * menu -->
            <!-- others -->
            <div class="listview-title mt-1">Others</div>
            <ul class="listview flush transparent no-line image-listview">
               <li>
                  <a href="{!! route('support.page') !!}" class="item">
                     <div class="icon-box bg-primary">
                        <i class="fal fa-headset"></i>
                     </div>
                     <div class="in">
                           Support
                     </div>
                  </a>
               </li>
               <li>
                  <a href="{!! url('logout') !!}" class="item">
                     <div class="icon-box bg-primary">
                        <i class="fal fa-sign-out-alt"></i>
                     </div>
                     <div class="in">
                           Log out
                     </div>
                  </a>
               </li>
            </ul>
            <!-- * others -->
         </div>
      </div>
   </div>
</div>
<!-- * App Sidebar -->
