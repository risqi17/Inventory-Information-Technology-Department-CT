<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Inventories;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.inventory.index');
    }
    public function datatables(){
        $result = DB::table('inventories')
        ->select('inventories.*', 'users.name AS employee', 'departments.name AS department','products.name AS product')
        ->leftJoin('users', 'users.id','=','inventories.created_by')
        ->leftJoin('products', 'products.id','=','inventories.id_product')
        ->leftJoin('departments', 'departments.id','=','inventories.id_department')
        ->orderBy('created_at','desc');

       return  DataTables::of($result)
        ->addColumn('action', function ($result) {
            
            // $url_edit = "<a href='".route('inventory.main.edit',  $result->id)."' class='btn btn-primary btn-xs'>Hapus</a>&nbsp;";
            $url_detail = "<a class='dropdown-item' href='".route('inventory.main.edit',  $result->id)."'>Detail</a>";
            $url_edit = "<a class='dropdown-item' href='".route('inventory.main.edit',  $result->id)."'>Edit</a>";
            $url_exit = "<a class='dropdown-item' href='".route('inventory.main.edit',  $result->id)."'>Keluarin</a>";
            $url_cancel = "<a class='dropdown-item' href='".route('inventory.main.edit',  $result->id)."'>Kembaliin</a>";
            $url_delete = "<form class='delete' action='".route('inventory.main.destroy', $result->id)."' method='DELETE'>
                                <button class='btn btn-danger dropdown-item' type='submit' alt='Hapus'><i class='icon-trash'></i> Hapus</button>
                            </form>";
            return "<div class='btn-group' role='group'>"
                    ."<button class='btn btn-success dropdown-toggle' id='btnGroupDrop1' type='button' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Action</button>"
                    ."<div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>"
                    .$url_detail .$url_edit .$url_exit .$url_cancel .$url_delete.
                    "</div></div></div>";
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
        ->editColumn('date_in', function ($result) {
            return $result->date_in ? with(new Carbon($result->date_in))->format('d/m/Y') : '';
        })
        ->editColumn('date_out', function ($result) {
            return $result->date_out ? with(new Carbon($result->date_out))->format('d/m/Y') : '';
        })
        ->addColumn('status', function ($result) {
            return getStatusInventory($result->status);
        })
        ->rawColumns(['action', 'status'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product        = DB::table('products')->get()->pluck('name', 'id');
        $department     = DB::table('departments')->get()->pluck('name', 'id');
        return view('layouts.inventory.create', compact('product','department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['id_department'] = $request->get('department');
        $data['id_product'] = $request->get('product');
        $data['quantity'] = $request->get('quantity');
        $data['date_in'] = $request->get('date_in');
        $data['status'] = 1;
        $data['created_by'] = Auth::user()->id;
        Inventories::create($data);

        return redirect()->route('inventory.main.index')
                            ->with('success','Inventory created successfully');
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
        $inventory = Inventories::findOrFail($id);
        $product        = DB::table('products')->get()->pluck('name', 'id');
        $department     = DB::table('departments')->get()->pluck('name', 'id');
        return view('layouts.inventory.edit', compact('product','department'));
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
        $data['id_category'] = $request->get('id_category');
        $data['updated_by'] = Auth::user()->id;
        $inventory = Inventories::findOrFail($id);
        $inventory->update($data);

        return redirect()->route('inventory.main.index')
                ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory = Inventories::findOrFail($id);
        $inventory->delete();

        return redirect()->route('inventory.main.index')
                ->with('success','Item deleted successfully');
    }
}
