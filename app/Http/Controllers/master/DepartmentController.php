<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Departments;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.master.department.index');
    }
    public function datatables(){
        $result = DB::table('departments')
        ->select('departments.*', 'users.name AS employee', 'companies.name AS company')
        ->leftJoin('users', 'users.id','=','departments.created_by')
        ->leftJoin('companies', 'companies.id','=','departments.id_company');

       return  DataTables::of($result)
        ->addColumn('action', function ($result) {
            // $url_edit = "<a href='".route('master.bank.edit', ['id' => $result->id])."' title='".trans('app.edit_title')."' data-toggle='tooltip' class='btn btn-outline'><span class='ti-pencil icon-lg'></span> </a>";  
            $url_edit = "<a href='".route('master.department.edit',  $result->id)."' class='btn btn-primary' type='button'><i class='icon-pencil'></i></a>&nbsp;";
            $url_delete = "<form class='delete' action='".route('master.department.destroy', $result->id)."' method='DELETE'>
                                <button class='btn btn-danger' type='submit' alt='Hapus'><i class='icon-trash'></i></button>
                            </form>";
            return "<div class='btn-group'>"
                    .$url_edit .$url_delete.
                    "</div>";
        }) 
        // ->addColumn('status', function ($result){
        //     if($result->status=='1'){
        //         return "<span class='badge badge-success'>Aktif</span>";
        //     }else{
        //         return "<span class='badge badge-danger'>Non Aktif</span>";
        //     }
        // })
        ->editColumn('created_at', function ($result) {
            return $result->created_at ? with(new Carbon($result->created_at))->format('d/m/Y') : '';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company      = DB::table('companies')->get()->pluck('name', 'id');
        return view('layouts.master.department.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = $request->all();
        $data['name'] = strtoupper($request->get('name'));
        $data['desc'] = strtoupper($request->get('desc'));
        $data['id_company'] = $request->get('company');
        $data['created_by'] = Auth::user()->id;
        Departments::create($data);

        return redirect()->route('master.department.index')
                            ->with('success','Department created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Departments::findOrFail($id);
        $company = DB::table('companies')->get()->pluck('name', 'id');
        return view('layouts.master.department.edit', compact('company','department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        
        $data['name'] = strtoupper($request->get('name'));
        $data['desc'] = strtoupper($request->get('desc'));
        $data['id_company'] = $request->get('id_company');
        $data['updated_by'] = Auth::user()->id;
        $department = Departments::findOrFail($id);
        $department->update($data);

        return redirect()->route('master.department.index')
                ->with('success','Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Departments::findOrFail($id);
        $department->delete();

        return redirect()->route('master.department.index')
                ->with('success','Department deleted successfully');
    }
}