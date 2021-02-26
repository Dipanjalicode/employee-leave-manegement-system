<?php

namespace App\Http\Controllers;

use App\Models\leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
      $role=$r->get('role');
      $email=$r->get('email');
             if($role==1){
           $data=leave::all();
           
           return view('/dashboard')->with('data',$data);
           }
           else{
             $data=leave::where('email',$email)->get();
     return view('/dashboard')->with('data', $data); 
             
           }
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
      
      $result=$r->post();
   $A=leave::where('email',$result['email'] )->get();
   if($result['email']==session()->get('email')){
   if(!$A->isEmpty()){
     echo "you have already applied";
     
   }
   else{
      
    leave::insert(array("name" =>$result['name'] ,"email" =>$result['email'] , "department"=>$result['department'] ,"leave_cause"=>$result['type'] ,"from"=>$result['from'] ,"to"=>$result["to"] ,"status"=>'1'));
    return redirect('dashboard');
   } 
   }
   else{
     
     echo "you cant apply for any body else";
   } 
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, leave $leave)
    {
    $status=$r->post('status');
     $email=$r->post('email');
     if(session()->get('role')==1){
     if($status!=""){
       leave::where('email',$email)->update(array("status"=>$status));
      return response()->json(array('st'=>$status), 200);
     }
     }
     else{
       return redirect()->back();
     }
     
        //
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $r, leave $leave)
    {
      $email=$r->get('email');
      if(session()->get('role')==1){
        leave::where('email',$email)->delete();
      return redirect('dashboard');
      }
      else{
        if($email==session()->get('email')){
          leave::where('email',$email)->delete();
      return redirect('dashboard');
        }
        else{
          return redirect()->back();
        }
        
      }
        
    }
}
