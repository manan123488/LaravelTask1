<?php

namespace App\Http\Controllers;


use App\Models\Companies;
use Illuminate\Http\Request;
use App\Http\Requests\CompaniesRequest;
use Yajra\DataTables\Facades\Datatables;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

         if ($request->ajax()) {
            $data = Companies::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $actionBtn =   '
                                   <a href="'.route('viewcompany', $row->id).'"
                                    class="edit btn btn-warning btn-sm">View</a>

                                    <a href="'.route('editCompany', $row->id).'"
                                    class="edit btn btn-success btn-sm">Edit</a>

                      <form action="'.route('deleteCompany', $row->id).'" method="POST" class="d-inline">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>
                    </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
         
        return view('company/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompaniesRequest $request)
    {
         $Data=[
        'name'=> $request->name,
        'email'=>$request->email,
        'website'=> $request->website,
         ];

         Companies::create($Data);
        return redirect()->route('companyhome')->with('success', 'Company created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data=Companies::find($id);
        
        return view('company/view',compact('data'));
    }

  
    //get id from route
    public function edit($id)
    {
         $data=Companies::find($id);
        return view('company/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompaniesRequest $request,$id)
    {
        $updateData=[
        'name'=> $request->name,
        'email'=>$request->email,
        'website'=> $request->website,
        ];

        companies::where('id', $id)->update($updateData);
        return redirect()->route('companyhome')->with('updatesuccess', 'Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Companies::where('id', $id)->delete();
        return redirect()->route('companyhome')->with('DeleteSuccess', 'Company deleted successfully!');
    }
  
}
