<?php

namespace App\Http\Controllers\Backend;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function reportList(Request $request)
    {
        // Validate the dates
        $request->validate([
            'start_date' => 'nullable|date|before_or_equal:today', 
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);
    
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->toDateString());
    
        $topFood = OrderDetail::select('menus.name', DB::raw('SUM(order_details.quantity) as total_quantity'))
            ->join('menus', 'order_details.food_id', '=', 'menus.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->whereBetween('orders.created_at', [$startDate, $endDate])
            ->groupBy('menus.name')
            ->orderBy('total_quantity', 'DESC')
            ->first();
    
        // Define a dynamic class based on some condition, for example, if a food item is found
        $dynamicClass = $topFood ? 'highlight-card' : 'normal-card';
    
        return view('backend.pages.report', compact('topFood', 'startDate', 'endDate', 'dynamicClass'));
    }
    
}
