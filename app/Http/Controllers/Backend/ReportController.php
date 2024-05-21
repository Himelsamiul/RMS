<?php

namespace App\Http\Controllers\Backend;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function reportList()
    {
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();

        $topFood = OrderDetail::select('menus.name', DB::raw('SUM(order_details.quantity) as total_quantity'))
            ->join('menus', 'order_details.food_id', '=', 'menus.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->whereBetween('orders.created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('menus.name')
            ->orderBy('total_quantity', 'DESC')
            ->first();

        return view('backend.pages.report', compact('topFood'));
    }
}
