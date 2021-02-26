@extends('layout') 
@section('title', 'add_department')
@section('body') 
<form method="post" action="update?id={{ $department[0]->id }}">
{{  @csrf_field() }} 

          <div class="content pb-0" >

            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Company</strong><small> Form</small></div>
                       
                        <div class="card-body card-block">
                           <div class="form-group"><label for="company" class=" form-control-label">Department</label><input type="text" id="company" placeholder="Add department"
                         value="{{ $department[0]->department }} "  
                           class="form-control" name="department" required="true"></div>
                              <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
</form>
@endsection 