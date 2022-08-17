<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Inventories;
use App\Models\AssetManagement;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Nonstandard\Uuid as NonstandardUuid;
use Ramsey\Uuid\Uuid;
use PDF;
use Vinkla\Hashids\Facades\Hashids;

class DashboardController extends Controller
{
    public function index()
    {
        return view('layouts.dashboard.index');
    }
    public function scan()
    {
        return view('layouts.dashboard.qrcode');
    }
}
