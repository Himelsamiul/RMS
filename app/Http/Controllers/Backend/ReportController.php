<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reportList()
    {
        $topSell = OrderDetail::all();
        // dd($topSell);
        return view('backend.pages.report');
    }
}
