<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeesRequest;
use Yajra\DataTables\Facades\Datatables;

class EmployeesController extends Controller
{


    public function index(Request $request)
    {

        if ($request->ajax()) {
             $data=Employees::with('companies')->get();
            
            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('companyName', function($row) {
                return $row->companies->name;
                 })

                ->addColumn('action', function($row){

                    $actionBtn =   '
                                   <a href="'.route('viewEmployee', $row->id).'"
                                    class="edit btn btn-warning btn-sm">View</a>

                                    <a href="'.route('editEmployee', $row->id).'"
                                    class="edit btn btn-success btn-sm">Edit</a>

                      <form action="'.route('deleteEmployee', $row->id).'" method="POST" class="d-inline">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // $data=Employees::with('companies')->get();
          return view('employee/index');
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
