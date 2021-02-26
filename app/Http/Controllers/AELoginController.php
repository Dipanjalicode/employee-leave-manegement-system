<?php

namespace App\Http\Controllers;

use App\Models\A_E_login;
use App\Models\leave;

use Illuminate\Http\Request;

class AELoginController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(Request $r){
       
      $role=$r->post('role');
      $email=$r->post('email');
      $pass=$r->post('pass');
      A_E_login::insert(array("role"=>$role, "email"=>$email,"password"=>$pass));
       return redirect('/');
       
       
       
       
     }
    public function index(Request $r)
    {
      $r->session()->forget('email');
      $r->session()->forget('pass');
      $r->session()->forget('role');
     return  redirect('/');
        
        }
    public function auth(Request $r)
    {
       $email= $r->post('email');
       $pass=$r->post('pass');
      $result=A_E_login::where(['email'=>$email,'password'=>$pass])->get();
       if(isset($result['0']->id)){
        $r->session()->put('role',$result['0']->role);
        $r->session()->put('email',$email);
        $r->session()->put('pass',$pass);
         if($result['0']->role==1){
           $data=leave::all();
           
           return view('/dashboard')->with('data',$data);
           }
           else{
             $data=leave::where('email',$result['0']->email)->get();
     return view('/dashboard')->with('data', $data); 
             
           }
       }
       else{
         $r->session()->flash('error', 'enter correct login details');
         return redirect('login');
       }
          
           
  
    }
    

}
