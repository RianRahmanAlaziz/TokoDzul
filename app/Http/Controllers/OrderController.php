<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $orders = Order::with('member')->get();

        return response()->json([
            'data' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                442
            );
        }

        $input = $request->all();
        $order = Order::create($input);

        for ($i = 0; $i < count($input['product_id']); $i++) {
            OrderDetail::created([
                'order_id' => $order['id'],
                'product_id' => $input['product_id'],
                'jumlah' => $input['jumlah'],
                'total' => $input['total']
            ]);
        }

        return response()->json([
            'data' => $order
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return response()->json([
            'message' => 'success',
            'data' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                442
            );
        }

        $input = $request->all();
        $order->update($input);

        OrderDetail::where('order_id', $order['id'])->delete();

        for ($i = 0; $i < count($input['product_id']); $i++) {
            OrderDetail::created([
                'order_id' => $order['id'],
                'product_id' => $input['product_id'],
                'jumlah' => $input['jumlah'],
                'total' => $input['total']
            ]);
        }

        return response()->json([
            'message' => 'success',
            'data' => $order
        ]);
    }

    public function ubah_status(Request $request, Order $order)
    {
        $rules = [
            'status' => 'required'
        ];

        $validator = $request->validate($rules);
        Order::where('id', $order->id)->update($validator);

        return Redirect::back()->with('success', 'Pesanan di ' . $validator['status']);
    }

    public function baru()
    {
        return view('dashboard.pesanan.baru', [
            'title' => 'Data Pesanan Baru',
            'orders' => Order::where('status', 'Baru')->get()
        ]);
    }

    public function dikonfirmasi()
    {
        return view('dashboard.pesanan.dikonfirmasi', [
            'title' => 'Data Pesanan Dikonfirmasi',
            'orders' => Order::with('member')->where('status', 'Dikonfirmasi')->get()
        ]);
    }

    public function dikemas()
    {
        return view('dashboard.pesanan.dikemas', [
            'title' => 'Data Pesanan Dikemas',
            'orders' => Order::with('member')->where('status', 'Dikemas')->get()
        ]);
    }

    public function dikirim()
    {
        return view('dashboard.pesanan.dikirim', [
            'title' => 'Data Pesanan Dikirim',
            'orders' => Order::with('member')->where('status', 'Dikirim')->get()
        ]);
    }

    public function diterima()
    {
        return view('dashboard.pesanan.diterima', [
            'title' => 'Data Pesanan Diterima',
            'orders' => Order::with('member')->where('status', 'Diterima')->get()
        ]);
    }

    public function selesai()
    {
        return view('dashboard.pesanan.selesai', [
            'title' => 'Data Pesanan Selesai',
            'orders' => Order::with('member')->where('status', 'Selesai')->get()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
