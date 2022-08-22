<?php

namespace App\Exports;

use App\Models\AssetManagement;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class AssetExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $result = DB::table('assets_management')
        ->select('assets_management.*', 'users.name AS employee', 'categories.name AS category')
        ->leftJoin('users', 'users.id','=','assets_management.created_by')
        ->leftJoin('categories', 'categories.id','=','assets_management.category_id')
        ->orderBy('created_at','desc')
        ->get();
        
        return view('export.asset_management', [
            'assets'  => $result,
        ]);
    }
}
