<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view('dashboard.report.index', [
            'title' => 'Laporan Pesanan'
        ]);
    }

    public function get_data(Request $request)
    {
        $report = DB::table('order_details')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->select(DB::raw('
                    nama_produk,
                    count(*) as jumlah_dibeli,
                    harga, 
                    SUM(total) as pendapatan,
                    SUM(jumlah) as total_qty'))
            ->whereRaw("date(order_details.created_at) >= '$request->dari'")
            ->whereRaw("date(order_details.created_at) <= '$request->sampai'")
            ->groupBy('product_id', 'nama_produk', 'harga')
            ->get();

        return response()->json([
            'data' => $report
        ]);
    }
}
