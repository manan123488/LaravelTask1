<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeesRequest;

class EmployeesController extends Controller
{


    public function index()
    {
        $data=Employees::with('companies')->get();
          return view('employee/index',compact('data'));
    }

    public function create()
    {
       $data=Companies::get();
        return view('employee/create',compact('data'));
    }

    
    public function store(EmployeesRequest $request)
    {
     
        $data=[
        'firstname'=>$request->Firstname,
        'lastname'=>$request->Lastname,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'company_id' => $request->companyId,
        ];
        Employees::create($data);
        return redirect()->route('employeehome')->with('success', 'Employee created successfully');
    }

  
    public function show($id)
    {
        $data=Employees::with('companies')->find($id);
        
        // dd($data);
        return view('employee/view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

       $data=Employees::with('Companies')->find($id);
      $company=Companies::get();
    //   dd($data);
    // dd($company);
       return view('employee/edit',compact('data','company'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeesRequest $request,$id)
    {
        
         $data=[
        'firstname'=>$request->Firstname,
        'lastname'=>$request->Lastname,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'company_id' => $request->companyId,
        ];
        // dd( $data);
        Employees::where('id',$id)->update($data);
        return redirect()->route('employeehome')->with('Updatesuccess', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
       Employees::where('id',$id)->delete();

       return redirect()->route('employeehome')->with('deletesuccess','Employee Delete successfully');
    }
}
