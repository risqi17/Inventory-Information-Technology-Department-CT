<?php

namespace App\Http\Controllers\Assets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Inventories;
use App\Models\AssetManagement;
use App\Models\AssetTransaction;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Nonstandard\Uuid as NonstandardUuid;
use Ramsey\Uuid\Uuid;
use PDF;
use Vinkla\Hashids\Facades\Hashids;


class AssetController extends Controller
{
    // 1 = Tersedia, 2 = digunakan
    public function index()
    {
        return view('layouts.assets.index');
    }
    public function datatables(){
        $result = DB::table('assets_management')
        ->select('assets_management.*', 'users.name AS employee', 'categories.name AS category')
        ->leftJoin('users', 'users.id','=','assets_management.created_by')
        ->leftJoin('categories', 'categories.id','=','assets_management.category_id')
        ->orderBy('created_at','desc');

       return  DataTables::of($result)
        ->addColumn('action', function ($result) {
            $url = 'printExternal("/assets/print/'.$result->id.'")';

            
            // $url_edit = "<a href='".route('inventory.main.edit',  $result->id)."' class='btn btn-primary btn-xs'>Hapus</a>&nbsp;";
            
            if($result->status_checkin=='1'){
                $url_check = "<a class='btn btn-success dropdown-item text-light' href='".route('assets.main.checkout',  $result->id)."'><i class='icon-arrow-up'></i> Check Out</a>";
            }else{
                $url_check = "<a class='btn btn-success dropdown-item  text-light' href='".route('assets.main.checkin',  $result->id)."'><i class='icon-arrow-down'></i> Check In</a>";
            }

            $url_detail = "<a class='dropdown-item' href='".route('assets.main.detail',  $result->id)."'>Detail</a>";
            $url_print = "<a class='dropdown-item'  href='#' title='Print Data' onclick='".$url."'>Print QR Code</a>";
            $url_edit = "<a class='dropdown-item' href='".route('inventory.main.edit',  $result->id)."'>Edit</a>";
            $url_delete = "<form class='delete' action='".route('inventory.main.destroy', $result->id)."' method='DELETE'>
                                <button class='btn btn-danger dropdown-item' type='submit' alt='Hapus'><i class='icon-trash'></i> Hapus</button>
                            </form>";
            return "<div class='btn-group' role='group'>"
                    ."<button class='btn btn-success dropdown-toggle' id='btnGroupDrop1' type='button' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Action</button>"
                    ."<div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>"
                    .$url_check 
                    .$url_print 
                    .$url_detail 
                    .$url_edit 
                    .$url_delete.
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
        ->editColumn('purchase_date', function ($result) {
            return $result->purchase_date ? with(new Carbon($result->purchase_date))->format('d/m/Y') : '';
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
        $category     = DB::table('categories')->get()->pluck('name', 'id');
        return view('layouts.assets.create', compact('category'));
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
        $data['product_name'] = strtoupper($request->get('product'));
        $data['asset_number'] = $request->get('number');
        $data['service_tag'] = $request->get('service');
        $data['specification'] = $request->get('specification');
        $data['category_id'] = $request->get('category');
        $data['warranty'] = $request->get('warranty');
        $data['quantity'] = $request->get('quantity');
        $data['purchase_date'] = $request->get('purchase_date');
        $data['status'] = $request->get('status');
        $data['status_checkin'] = 1;
        $data['created_by'] = Auth::user()->id;
        $data['uuid'] = Uuid::uuid4();
        AssetManagement::create($data);

        return redirect()->route('assets.main.index')
                            ->with('success','Inventory created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $asset = DB::table('assets_management')
        ->select('assets_management.*', 'users.name AS employee', 'categories.name AS category')
        ->leftJoin('users', 'users.id','=','assets_management.created_by')
        ->leftJoin('categories', 'categories.id','=','assets_management.category_id')
        ->where('assets_management.id',$id)
        ->first();

        $transaction        = DB::table('asset_transaction')
        ->select('asset_transaction.*', 'users.name AS employee', 'departments.name AS department')
        ->leftJoin('assets_management', 'assets_management.id','=','asset_transaction.asset_id')
        ->leftJoin('users', 'users.id','=','asset_transaction.created_by')
        ->leftJoin('departments', 'departments.id','=','asset_transaction.department_id')
        ->where('asset_transaction.asset_id', $id)
        ->orderBy('asset_transaction.transaction_date','desc')
        ->get();

        return view('layouts.assets.show', compact('asset','transaction'));
    }

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

    public function print($id)
    {
        $asset = AssetManagement::findOrFail($id);
        return view('layouts.assets.pdf', compact('asset'));

    }

    public function history($id)
    {
        $asset = DB::table('assets_management')
        ->select('assets_management.*', 'users.name AS employee', 'categories.name AS category')
        ->leftJoin('users', 'users.id','=','assets_management.created_by')
        ->leftJoin('categories', 'categories.id','=','assets_management.category_id')
        ->where('assets_management.uuid',$id)
        ->first();

        $transaction        = DB::table('asset_transaction')
        ->select('asset_transaction.*', 'users.name AS employee', 'departments.name AS department')
        ->leftJoin('assets_management', 'assets_management.id','=','asset_transaction.asset_id')
        ->leftJoin('users', 'users.id','=','asset_transaction.created_by')
        ->leftJoin('departments', 'departments.id','=','asset_transaction.department_id')
        ->where('assets_management.uuid', $id)
        ->orderBy('asset_transaction.transaction_date','desc')
        ->get();

        return view('layouts.assets.show', compact('asset','transaction'));

    }

    public function checkOut($id)
    {
        $asset = AssetManagement::findOrFail($id);
        $department     = DB::table('departments')->get()->pluck('name', 'id');

        return view('layouts.assets.transaction', compact('asset','department'));

    }

    public function checkOutProcess(Request $request)
    {
        $data = $request->all();
        $data['user'] = strtoupper($request->get('user'));
        $data['asset_id'] = $request->get('id');
        $data['department_id'] = $request->get('department');
        $data['transaction_date'] = $request->get('checkout_date');
        $data['type'] = "CHECKOUT";
        $data['created_by'] = Auth::user()->id;

        AssetTransaction::create($data);

        $dataManagement['status'] = 4;
        $dataManagement['status_checkin'] = 2;

        $assetMgmt = AssetManagement::findOrFail($request->get('id'));
        $assetMgmt->update($dataManagement);

        return redirect()->route('assets.main.index')
                            ->with('success','Inventory created successfully');

    }

    public function checkIn($id)
    {
        $asset = AssetManagement::findOrFail($id);
        $transaction        = DB::table('asset_transaction')
        ->select('asset_transaction.*')
        ->where('asset_id', $id)
        ->orderBy('transaction_date','desc')
        ->limit(1)
        ->first();

        return view('layouts.assets.transaction_in', compact('asset','transaction'));

    }

    public function checkInProcess(Request $request)
    {
        $data = $request->all();
        $data['user'] = strtoupper($request->get('user'));
        $data['asset_id'] = $request->get('id');
        $data['department_id'] = $request->get('department');
        $data['transaction_date'] = $request->get('checkout_date');
        $data['type'] = "CHECKIN";
        $data['created_by'] = Auth::user()->id;

        AssetTransaction::create($data);

        $dataManagement['status'] = 1;
        $dataManagement['status_checkin'] = 1;

        $assetMgmt = AssetManagement::findOrFail($request->get('id'));
        $assetMgmt->update($dataManagement);

        return redirect()->route('assets.main.index')
                            ->with('success','Inventory created successfully');

    }
}
