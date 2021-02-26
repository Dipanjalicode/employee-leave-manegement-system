@extends("layout")
@section('title', 'department') 
@section('body')
 <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Orders </h4>
                        </div>
                        <div class="add">
                          <a href="add_department" style="  background-color: white;color:red; border: 1px solid green;padding: 5px 20px;text-align: center;text-decoration: none;display: inline-block;position:relative;bottom:10px">add_department</a>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                   
                                       <th>ID</th>
                                       <th>department</th>
                       <th></th>
                     <th>edit</th>
                     <th></th>
                     <th>delete</th>
                          
                                       
                                    </tr>
                                 </thead>
                                 <tbody>
                             @foreach($result as $r) 
                                   <tr>
                                
                                  
                                       <td> {{ $r->id }} </td>
                                       <td ><span class="name">{{ $r->department }} </span><td/>
                                       <td >
                      <a href="Edit?id={{ $r->id }}">  <span class="badge badge-complete">Edit</span>
                       <a/> <td/>
                         <td>               <a href="delete_department?id={{ $r->id }}"><span class ="badge badge-delete">Delete</span><a/>
                                       </td>
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
@endsection 