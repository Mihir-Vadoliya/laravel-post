<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chart;
use App\Models\Masterobject;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Dcblogdev\src\Xero;
use DB;

class DashbordController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
}
