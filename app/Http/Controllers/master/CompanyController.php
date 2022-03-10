<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Companies;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Faker\Provider\ar_EG\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.master.company.index');
    }
    public function datatables()
    {
        $result = DB::table('companies')
        ->select('companies.*', 'users.name AS employee')
        ->leftJoin('users', 'users.id','=','companies.created_by');

       return  DataTables::of($result)
        ->addColumn('action', function ($result) {
            // $url_edit = "<a href='".route('master.bank.edit', ['id' => $result->id])."' title='".trans('app.edit_title')."' data-toggle='tooltip' class='btn btn-outline'><span class='ti-pencil icon-lg'></span> </a>";  
            $url_edit = "<a href='".route('master.company.edit',  $result->id)."' class='btn btn-primary' type='button'><i class='icon-pencil'></i></a>&nbsp;";
            $url_delete = "<form class='delete' action='".route('master.company.destroy', $result->id)."' method='DELETE'>
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
        return view('layouts.master.company.create');
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
        $data['created_by'] = Auth::user()->id;
        Companies::create($data);

        return redirect()->route('master.company.index')
                            ->with('success','Company created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Companies::findOrFail($id);
        return view('layouts.master.company.edit', compact('company'));
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
        $data['updated_by'] = Auth::user()->id;
        $company = Companies::findOrFail($id);
        $company->update($data);

        return redirect()->route('master.company.index')
                ->with('success','Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $company = Companies::findOrFail($id);
        $company->delete();

        return redirect()->route('master.company.index')
                ->with('success','Company deleted successfully');
    }
}
