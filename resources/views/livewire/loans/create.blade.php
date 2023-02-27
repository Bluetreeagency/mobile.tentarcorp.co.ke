<div>
   <div class="card">
      <div class="card-body">
         <div class="form-group basic">
            <div class="input-wrapper">
               <label class="label" for="select4">Loan Type</label>
               <select class="form-control custom-select" id="select4" wire:model="loan_type" required>
                  <option value="3">Choose loan type</option>
                  <option value="Dharura">Dharura Loan</option>
                  <option value="Mradi">Mradi Loan</option>
               </select>
            </div>
            @error('loan_type')<span class="error text-danger">{{$message}}</span>@enderror
         </div>
         <div class="form-group basic">
            <div class="input-wrapper">
               <label class="label">Amount</label>
               <input type="number" class="form-control" wire:model="amount" id="phone4" placeholder="Enter amount" min="5" max="10" required>
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

   @php
      if($amount){
         if($amount >= 5000){
            $intrest = 0;
         }else {
            $intrest = $amount * 0.125 * $payment_period;
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
            <div class="price">12.5%</div>
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
</div>
