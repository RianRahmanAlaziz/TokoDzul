@extends('layouts.main')

@section('container')
    <!-- Page Title -->
    <section class="page-title text-center bg-light">
        <div class="container relative clearfix">
          <div class="title-holder">
            <div class="title-text">
              <h1 class="uppercase">CheckOut</h1>
              <ol class="breadcrumb">
                <li>
                  <a href="/">Home</a>
                </li>
                <li>
                  <a href="/shop">Shop</a>
                </li>
                <li class="active">
                  CheckOut
                </li>
              </ol>
            </div>
          </div>
        </div>
      </section>

          <!-- Checkout -->
          <section class="section-wrap checkout pb-70">
            <div class="container relative">
              <div class="row">
    
                <div class="ecommerce col-xs-12">
    

    
                  <form name="checkout" class="checkout ecommerce-checkout row" method="POST" action="/payments">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="col-md-8" id="customer_details">
                      <div>
                        <h2 class="heading uppercase bottom-line full-grey mb-30">billing address</h2>
    
                        <p class="form-row form-row-first validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_first_name_field">
                          <label for="atas_nama">Atas Nama
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <input type="text" class="input-text" placeholder value name="atas_nama" id="atas_nama">
                        </p>

                        <p class="form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                          <label for="no_rekening">No Rekening
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <input type="text" class="input-text" placeholder value name="no_rekening" id="no_rekening">
                        </p>

                        <p class="form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                          <label for="n_transfer">Nominal Transfer
                            <abbr class="required" title="required">*</abbr>
                          </label>
                          <input type="number" class="input-text" placeholder value name="n_transfer" id="n_transfer">
                        </p>
    
                        <div class="clear"></div>
    
                      </div>

    
                      <div class="clear"></div>
    
                    </div> <!-- end col -->
    
                    <!-- Your Order -->
                    <div class="col-md-4">
                      <div class="order-review-wrap ecommerce-checkout-review-order" id="order_review">
                        <h2 class="heading uppercase bottom-line full-grey">Your Order</h2>
                        <table class="table shop_table ecommerce-checkout-review-order-table">
                          <tbody>
                            {{-- <tr>
                              <th>Business Suit<span class="count"> x 1</span></th>
                              <td>
                                <span class="amount">$599.00</span>
                              </td>
                            </tr>
                            <tr>
                              <th>California Dress<span class="count"> x 1</span></th>
                              <td>
                                <span class="amount">$1299.00</span>
                              </td>
                            </tr>
                            <tr class="cart-subtotal">
                              <th>Cart Subtotal</th>
                              <td>
                                <span class="amount">$1799.00</span>
                              </td>
                            </tr>
                            <tr class="shipping">
                              <th>Shipping</th>
                              <td>
                                <span>Free Shipping</span>
                              </td>
                            </tr> --}}
                            <tr class="order-total">
                              <th><strong>Order Total</strong></th>
                              <td>
                                <strong><span class="amount">@rupiah($order->grand_total)</span></strong>
                              </td>
                            </tr>
                          </tbody>
                        </table>
    
                        <div id="payment" class="ecommerce-checkout-payment">
                          <h2 class="heading uppercase bottom-line full-grey">Payment Method</h2>
                          <ul class="payment_methods methods">
    
                            <li class="payment_method_bacs">
                              <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked">
                              <label for="payment_method_bacs">Direct Bank Transfer</label>
                              <div class="payment_box payment_method_bacs">
                                <p>No Rekening : 111-222-333-444</p>
                              </div>
                            </li>
    
                          </ul>
                          <div class="form-row place-order">
                            <input type="submit" name="ecommerce_checkout_place_order" class="btn btn-lg btn-dark" id="place_order" value="Place order">
                          </div>
                        </div>
                      </div>
                    </div> <!-- end order review -->
                  </form>
    
                </div> <!-- end ecommerce -->
    
              </div> <!-- end row -->
            </div> <!-- end container -->
          </section> <!-- end checkout -->
@endsection