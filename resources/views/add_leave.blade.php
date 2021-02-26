@extends("layout")
@section('title', 'add_leave') 
@section('body')
<form method="post" action="leave_submit">
  {{  @csrf_field() }}  
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>add_leave</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <div class="form-group"><label for="company" class=" form-control-label">name</label><input type="text" id="company" placeholder="Enter name" class="form-control" name="name"></div>
                           <div class="form-group"><label for="vat" class=" form-control-label">email</label><input type="text" id="vat" class="form-control" name="email"></div>
                       <div class="form-group"><label for="country" class=" form-control-label">Department</label><input type="text" id="country" placeholder="Department name" class="form-control"name="department"></div>
                         <div class="form-group"><label for="country" class=" form-control-label">Leave_type</label> <select class="form-control" name="type">
                           <option>
                             select leave_type
                           </option>
                           <option>
                             Sick
                           </option>
                           <option>
                             Maternity
                           </option>
                           <option>
                             Religious
                           </option>
                           
                             <option>
                             Paternity
                           </option>
                           <option>
                             Compensatory
                           </option>
                         </select>
                         
                         </div>
                          <div class="form-group"><label for="country" class=" form-control-label">from_date</label><input type="date" id="country"  class="form-control" name="from"></div>
                      <div class="form-group"><label for="country" class=" form-control-label">to_date</label><input type="date" id="country"  class="form-control" name="to"></div>
                           <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
</form>

@endsection