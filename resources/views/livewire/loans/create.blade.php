<div>
   <div class="card">
      <div class="card-body">
         <div class="form-group basic">
            <div class="input-wrapper">
               <label class="label" for="select4">Loan Type</label>
               <select class="form-control custom-select" id="select4" wire:model="loan_type" required>
                  <option value="3">Choose loan type</option>
                  <option value="Dharura">Dharura Loan</option>
                  <option value="Miradi">Miradi Loan</option>
               </select>
            </div>
            @error('loan_type')<span class="error text-danger">{{$message}}</span>@enderror
         </div>
         <div class="form-group basic">
            <div class="input-wrapper">
               <label class="label">Amount</label>
               <input type="number" class="form-control" wire:model="amount" id="phone4" placeholder="Enter amount" required>
            </div>
            @error('amount')<span class="error text-danger">{{$message}}</span>@enderror
         </div>
         <div class="form-group basic">
            <div class="input-wrapper">
               <label class="label">Payment period in months</label>
               <input type="number" wire:model="payment_period" class="form-control" id="phone4" placeholder="Enter mounth" required>
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

   <div class="goals mt-3">
      <!-- item -->
      <div class="item">
         <div class="in mb-0">
            <div>
               <h4>Interest Per Month</h4>
            </div>
            <div class="price">ksh 450</div>
         </div>
      </div>
      <div class="item">
         <div class="in mb-0">
            <div>
               <h4>Repayment Period</h4>
            </div>
            <div class="price">ksh 450</div>
         </div>
      </div>
      <div class="item">
         <div class="in mb-0">
            <div>
               <h4>Interest Amount P.M</h4>
            </div>
            <div class="price">ksh 450</div>
         </div>
      </div>
      <div class="item">
         <div class="in mb-0">
            <div>
               <h4>Amount To </h4>
            </div>
            <div class="price">ksh 450</div>
         </div>
      </div>
   </div>

   <button class="btn btn-block btn-success mt-3" wire:click="store()">Submit Application</button>
</div>
