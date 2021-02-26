@extends("layout")
@section('title', 'dashboard') 
@section('body')
 <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Orders </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                   
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>email</th>
                           <th>department </th>
                                       <th>leave_cause</th>
                                 
                         <th>from</th>
                         <th>to</th>
                                       <th>Status<th/>
                                       
                                    </tr>
                                 </thead>
                                 <tbody>
                                  @foreach($data as $d) 
                                   <tr>
                                  
                                       <td> {{ $d->id }} </td>
                                       <td> <span class="name">{{ $d->name }} </span> </td>
                                       <td> <span class=>{{ $d->email }} </span> </td>
                                       <td><span >{{ $d->department }} </span></td>
                                       <td ><span>{{ $d->leave_cause }} </span></td>
                                       <td><span>{{ $d->from }} </span></td>
                                       <td><span>{{ $d->to }} </span></td>
                               @if($d->status==1)
                                       
                                       <td id="{{ $d->id }} ">
                                          <span class="badge badge-pending">pending</span>
                        
 
                         @if(session()->get('role')==1) 
                          <span>
                          <select class="form-control" style="margin-top:13px; width:100px;height:35px" onChange="select_status(this. value, '{{ $d->email }}','{{ $d->id }}')">
                            <option value="">
                              select 
                          </option>
                            <option value="2">
                              approve
                            </option>
                            <option value="3">
                              reject
                            </option>
                          </select>
                          </span>
                          
                          @endif
                                       </td>
                                      
                                        <td>
                          <a href="delete_leave?email={{ $d->email }}">
                                          <span class="badge badge-delete">Delete</span>
                        </a>
                                       </td>
                                       @endif
                                                     @if($d->status==2)
                                       
                                       <td id="{{ $d->id }} ">
                                          <span class="badge badge-approve">approve</span>
                        
                           
                         @if(session()->get('role')==1) 
                          <span>
                          <select class="form-control" style="margin-top:13px; width:100px;height:35px" onChange="select_status(this. value, '{{ $d->email }}','{{ $d->id }}')">
                            <option value="">
                              select 
                          </option>
                            <option value="2" selected="true">
                              approve
                            </option>
                            <option value="3">
                              reject
                            </option>
                          </select>
                          </span>
                          @endif
                                       </td>
                                      
                                        <td>
                                              <a href="delete_leave?email={{ $d->email }}">
                                         
                                          <span class="badge badge-delete">Delete</span>
                                </a>
                                       </td>
                                       @endif
              @if($d->status==3)
                                       
                                       <td id="{{ $d->id }}">
                                          <span class="badge badge-rejected">rejected</span>
                        
                         @if(session()->get('role')==1) 
                          <span>
                          <select class="form-control" style="margin-top:13px; width:100px;height:35px" onChange="select_status(this. value, '{{ $d->email }}', '{{ $d->id }}')">
                            <option value="">
                              select 
                          </option>
                            <option value="2">
                              approve
                            </option>
                            <option value="3" selected="true">
                              reject
                            </option>
                          </select>
                          </span>
                          @endif
                                       </td>
                                      
                                        <td
                             >
                 <a href="delete_leave?email={{ $d->email }}">
                                         
                                          <span class="badge badge-delete">Delete</span>
                                    
                        </a>               </td>
                                       @endif
                                    </tr>
                       @endforeach 
                    
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		  <script>
		 function select_status(status,email, id){
		   
		   var status=status;
		   var email=email;
		   var id=id;
		   $_token = "{{ csrf_token() }}"; 
          $.ajax({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        url: "{{ url('/change_status') }}",
        type: 'POST',
        cache: false,
        data: {'status':status,'email':email, '_token':$_token}, 
        success: function(data){
            if(data.st==2){
		            $('#'+id).html('<span  class="badge badge-approve">approve</span>' );
		          }
		          else{
		            $('#'+id).html('<span  class="badge badge-rejected">rejected</span>');
		          }
        }
          
          });
          
		 } 
		    
		    
		  </script>
@endsection 