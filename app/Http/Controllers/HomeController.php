<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'title' => 'Situs Belanja Online',
            'categories' => Category::all(),
            'sliders' => Slider::all(),
            'products' => Product::skip(0)->take(8)->get()
        ]);
    }

    public function shop()
    {
        return view('shops', [
            'title' => 'Situs Belanja Online',
            'categories' => Category::all(),
            'products' => Product::all()
        ]);
    }

    public function show(Product $product)
    {
        return view('shop', [
            'title' => 'Situs Belanja Online',
            'product' => $product
        ]);
    }

    public function checkout()
    {
        return view('checkout', [
            'title' => 'CheckOut',
            'order' => Order::where('user_id', Auth()->user()->id)->first(),
        ]);
    }

    public function order()
    {
        return view('order', [
            'title' => 'Order',
            'orders' => Order::where('user_id', Auth()->user()->id)->get(),
            'payments' => Payment::where('user_id', Auth()->user()->id)->get(),
        ]);
    }

    public function payment(Request $request)
    {
        Payment::create([
            'order_id' => $request->order_id,
            'user_id' => $request->user_id,
            'atas_nama' => $request->atas_nama,
            'no_rekening' => $request->no_rekening,
            'jumlah' => $request->n_transfer,
            'status' => 'Pending',
        ]);
        return redirect('/order');
    }

    public function shop_cart()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: f345ad973b2de87eac4c6203af80c54b"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $provinsi = json_decode($response);
        $cart_total = Cart::where('user_id', Auth()->user()->id)->where('is_checkout', 0)->sum('total');
        return view('shop-cart', [
            'title' => 'Cart',
            'carts' => Cart::where('user_id', Auth()->user()->id)->where('is_checkout', 0)->get(),
            'provinsi' => $provinsi,
            'cart_total' => $cart_total
        ]);
    }

    public function getKabupaten($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: f345ad973b2de87eac4c6203af80c54b"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function getOngkir($destination)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=22&destination=" . $destination . "&weight=1700&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: f345ad973b2de87eac4c6203af80c54b"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function addToCart(Request $request)
    {
        $input = $request->all();
        Cart::create($input);
    }

    public function deleteToCart(Cart $cart)
    {
        $cart->delete();
        return redirect('/cart');
    }

    public function checkoutOrder(Request $request)
    {
        $id = DB::table('orders')->insertGetId([
            'user_id' => $request->user_id,
            'invoice' => date('ymds'),
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'detail_alamat' => $request->detail_alamat,
            'grand_total' => $request->grandTotal,
            'status' => 'Baru',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        for ($i = 0; $i < count($request->product_id); $i++) {
            DB::table('order_details')->insert([
                'order_id' => $id,
                'product_id' => $request->product_id[$i],
                'jumlah' => $request->jumlah[$i],
                'total' => $request->total[$i],
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        Cart::where('user_id', Auth()->user()->id)->update([
            'is_checkout' => 1
        ]);
    }
}
