<div>
   <div class="card">
      <div class="card-body">
         <div class="form-group basic">
            <div class="input-wrapper">
               <label class="label" for="select4">Loan Type</label>
               <select class="form-control custom-select" id="select4" wire:model="loan_type" required>
                  <option value="">Choose loan type</option>
                  @foreach ($loanSettings as $loanSetting)
                     <option value="{!! $loanSetting->code !!}">{!! $loanSetting->loan !!} Loan</option>
                  @endforeach
               </select>
            </div>
            @error('loan_type')<span class="error text-danger">{{$message}}</span>@enderror
         </div>
         <div class="form-group basic">
            <div class="input-wrapper">
               <label class="label">Amount</label>
               @if($loan_type)
                  @if(Auth::user()->loan_limit_dharura)
                     @if($loan_type == 'Dharura')
                        <input type="number" class="form-control" wire:model="amount" id="phone4" placeholder="Enter amount" min="5000" max="{!! Auth::user()->loan_limit_dharura !!}" required>
                     @endif
                        <input type="number" class="form-control" wire:model="amount" id="phone4" placeholder="Enter amount" min="30000" max="{!! Auth::user()->loan_limit_mradi !!}" required>
                     @endif
                  @else
                     <input type="number" class="form-control" wire:model="amount" id="phone4" placeholder="Enter amount" min="{!! Loan::loan_settings($loan_type)->min_limit !!}" max="{!! Loan::loan_settings($loan_type)->max_limit !!}" required>
                  @endif
               @endif
            </div>
            @error('amount')<span class="error text-danger">{{$message}}</span>@enderror
         </div>
         <div class="form-group basic">
            <div class="input-wrapper">
               <label class="label">Payment period in months</label>
               <select wire:model="payment_period" class="form-control" required>
                  <option value="">choose payment period</option>
                  <option value="1">1</option>
                  @if($loan_type == 'Mradi')
                     <option value="2">2</option>
                     <option value="3">3</option>
                  @endif
               </select>
            </div>
            @error('payment_period')<span class="error text-danger">{{$message}}</span>@enderror
         </div>
         <div class="form-group basic">
            <div class="input-wrapper">
               <label class="label">Reason for loan application</label>
               <textarea wire:model="loan_reason" class="form-control" cols="4" rows="4" placeholder="Type here ...."></textarea>
            </div>
            @error('loan_reason')<span class="error text-danger">{{$message}}</span>@enderror
         </div>
      </div>
   </div>

   @if($loan_type)
      @php
         $loanInfo = Loan::loan_settings($loan_type);
         if($amount){
            if($amount <= 4999){
               $intrest = 0;
            }else {
               $intrest = $amount * ($loanInfo->interest_rate/100) * $payment_period;
            }
         }else{
            $intrest = 0;
         }

      @endphp
      <div class="goals mt-3">
         <!-- item -->
         <div class="item">
            <div class="in mb-0">
               <div>
                  <h4>Interest Rate Per Month</h4>
               </div>
               <div class="price">{!! $loanInfo->interest_rate !!}%</div>
            </div>
         </div>
         <div class="item">
            <div class="in mb-0">
               <div>
                  <h4>Repayment Period</h4>
               </div>
               <div class="price">{{ $payment_period }} Monthly</div>
            </div>
         </div>
         <div class="item">
            <div class="in mb-0">
               <div>
                  <h4>Interest Amount P.M</h4>
               </div>
               <div class="price">ksh {!! number_format($intrest) !!}</div>
            </div>
         </div>
         <div class="item">
            <div class="in mb-0">
               <div>
                  <h4>Amount To Pay</h4>
               </div>
               <div class="price">ksh @if($amount){!! number_format($intrest + $amount) !!}@else 0 @endif</div>
            </div>
         </div>
      </div>

      <button class="btn btn-block btn-success mt-3" wire:click="store()">Submit Application</button>
      <div wire:loading wire:target="store">
         <center><img src="{!! asset('assets/img/btn-loader.gif') !!}" class="img-responsive" alt="loader" style="width:30%"></center>
      </div>
   @endif
</div>
