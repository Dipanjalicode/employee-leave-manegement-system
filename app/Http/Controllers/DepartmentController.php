<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
     $department=$r->post('department');
     department::insert(array("department"=>$department));
     return redirect('department');
      
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
     
      
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(department $department)
    {
      $result=department::all();
        return view('/department')->with('result',$result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(department $department, Request $r)
    {
      
      $id=$r->get('id');
      $dept=department::where('id',$id)->get();
      
     
      return view('Edit', array('department' =>$dept));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, department $department)
    {
      
     $id=$r->get('id');
     
      $d=$r->post('department') ;
      department::where("id",$id)->update(array("department"=>$d));
      return redirect('department');
     
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $r, department $department)
    {
      $id=$r->get('id');
     department::where('id',$id)->delete();
     
      return redirect('department');
        //
    }
}
