@extends('layouts.main')
@section('container')
    <!-- Page Title -->
    <section class="page-title text-center bg-light">
      <div class="container relative clearfix">
        <div class="title-holder">
          <div class="title-text">
            <h1 class="uppercase">Cart</h1>
            <ol class="breadcrumb">
              <li>
                <a href="/">Home</a>
              </li>
              <li>
                <a href="/shop">Shop</a>
              </li>
              <li class="active">
                Cart
              </li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    

      <!-- Cart -->
      <section class="section-wrap shopping-cart">
        <div class="container relative">
          <form class="form-cart">
              <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <div class="row">
              <div class="col-md-12">
                <div class="table-wrap mb-30">
                  <table class="shop_table cart table">
                    <thead>
                      <tr>
                        <th class="product-name" colspan="2">Product</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-subtotal" colspan="2">Total</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($carts as $cart)
                      <input type="hidden" name="product_id[]" value="{{ $cart->product->id }}">
                      <input type="hidden" name="jumlah[]" value="{{ $cart->jumlah }}">
                      <input type="hidden" name="total[]" value="{{ $cart->total }}">
                      <tr class="cart_item">
                        <td class="product-thumbnail">
                          <a href="#">
                            <img src="/img/product/{{ $cart->product->gambar }}" alt="">
                          </a>
                        </td>
                        <td class="product-name">
                          <a href="#">{{ $cart->product->nama_produk }}</a>
                        </td>
                        <td class="product-price">
                          <span class="amount">@rupiah($cart->product->harga)</span>
                        </td>
                        <td class="product-quantity">
                          <div class="quantity buttons_added">
                            <span>{{ $cart->jumlah }}</span>
                          </div>
                        </td>
                        <td class="product-subtotal">
                          <span class="amount">@rupiah($cart->total)</span>
                        </td>
                        <td class="product-remove">
                          <a href="/deleteToCart/{{ $cart->id }}" class="remove" title="Remove this item">
                            <i class="ui-close"></i>
                          </a>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>

                <div class="row mb-50">
                  <div class="col-md-5 col-sm-12">
                  </div>

                  <div class="col-md-7">
                    <div class="actions">
                      <div class="wc-proceed-to-checkout ">
                        <a href="" class="btn btn-lg btn-dark checkout"><span>proceed to checkout</span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- end col -->
            </div> <!-- end row -->

          <div class="row">
            <div class="col-md-6 shipping-calculator-form">
              <h2 class="heading relative uppercase bottom-line full-grey mb-30">Calculate Shipping</h2>
              <p class="form-row form-row-wide">
                <select name="provinsi" id="provinsi" class="country_to_state provinsi" rel="calc_shipping_state">
                  <option value="">Pilih Provinsi</option>
                  @foreach ($provinsi->rajaongkir->results as $item)
                      <option value="{{ $item->province_id }}" namaprovinsi="{{ $item->province }}">{{ $item->province }}</option>
                  @endforeach
                </select>
              </p>

              <p class="form-row form-row-wide">
                <select name="kabupaten" id="kabupaten" class="country_to_state kabupaten" rel="calc_shipping_state">
                  <option value="">Pilih Kecamatan</option>
                </select>
              </p>

              <div class="row row-10">
                <div class="col-sm-12">
                  <p class="form-row form-row-wide">
                    <input type="text" class="input-text" placeholder="Detail Alamat" name="detail_alamat" id="detail_alamat">
                  </p>
                </div>

              </div>

              <p>
                <a href="" class="btn btn-lg btn-dark update-total"><span>Update Total</span></a>
              </p>                
            </div> <!-- end col shipping calculator -->

            <div class="col-md-6">
              <div class="cart_totals">
                <h2 class="heading relative bottom-line full-grey uppercase mb-30">Cart Totals</h2>

                <table class="table shop_table">
                  <tbody>
                    <tr class="cart-subtotal">
                      <th>Cart Subtotal</th>
                      <td>
                        <span class="amount cart_total">{{ $cart_total }}</span>
                      </td>
                    </tr>
                    <tr class="shipping">
                      <th>Shipping</th>
                      <td>
                        <span class="shipping-cost">0</span>
                      </td>
                    </tr>
                    <tr class="order-total">
                      <th>Order Total</th>
                      <td>
                        <input type="hidden" name="grandTotal" class="grandTotal">
                        <strong><span class="amount grand_total">0</span></strong>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div> <!-- end col cart totals -->

          </div> <!-- end row -->     
        </form>
          
        </div> <!-- end container -->
      </section> <!-- end cart -->

@endsection
@push('js')
    <script>
      $(function(){
        function rupiah(angka){
                const format = angka.toString().split('').reverse().join('');
                const convert = format.match(/\d{1,3}/g);
                return 'Rp ' + convert.join('.').split('').reverse().join('');
            }

            $('.provinsi').change(function(){
              $.ajax({
                  url : '/getKabupaten/' + $(this).val(),
                  success : function (data){
                      data = JSON.parse(data)
                      option = ""
                      data.rajaongkir.results.map((kabupaten)=> {
                        option += `<option value="${kabupaten.city_id}">${kabupaten.city_name}</option>` 
                      })
                      $('.kabupaten').html(option)
                  }
              })
            })

            $('.update-total').click(function(e){
              e.preventDefault()
              $.ajax({
                  url : '/getOngkir/' + $('.kabupaten').val(),
                  success : function (data){
                      data = JSON.parse(data)
                      grandTotal = parseInt(data.rajaongkir.results[0].costs[0].cost[0].value) + parseInt($('.cart_total').text())
                      $('.shipping-cost').text(rupiah(data.rajaongkir.results[0].costs[0].cost[0].value))

                      $('.grand_total').text(rupiah(grandTotal))
                      $('.grandTotal').val(grandTotal)
                  }
              })
            })

            $('.checkout').click(function(e){
              e.preventDefault()
              $.ajax({
                  url : '/checkout-order',
                  method : 'POST',
                  headers: {
                          'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                  data  : $('.form-cart').serialize(),
                  success : function (){
                      location.href = '/checkout'
                  }
              })
            })
      })
    </script>
@endpush