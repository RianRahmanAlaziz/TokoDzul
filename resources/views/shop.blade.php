@extends('layouts.main')

@section('container')
      <!-- Single Product -->
      <section class="section-wrap pb-40 single-product">
        <div class="container-fluid semi-fluid">
          <div class="row">

            <div class="col-md-6 col-xs-12 product-slider mb-60">

              <div class="flickity flickity-slider-wrap mfp-hover" id="gallery-main">

                <div class="gallery-cell">
                  <a href="/img/product/{{ $product->gambar }}" class="lightbox-img">
                    <img src="/img/product/{{ $product->gambar }}" alt="" />
                    <i class="ui-zoom zoom-icon"></i>
                  </a>
                </div>

              </div> <!-- end gallery main -->

              <div class="gallery-thumbs">

                <div class="gallery-cell">
                  <img src="/img/product/{{ $product->gambar }}" alt="" />
                </div>
              </div> <!-- end gallery thumbs -->

            </div> <!-- end col img slider -->

            <div class="col-md-6 col-xs-12 product-description-wrap">
              <ol class="breadcrumb">
                <li>
                  <a href="index.html">Home</a>
                </li>
                <li>
                  <a href="index.html">Shop</a>
                </li>
                <li class="active">
                  Catalog
                </li>
              </ol>
              <h1 class="product-title">{{ $product->nama_produk }}</h1>              
              <span class="price">

                <ins>
                  <span class="amount">@rupiah($product->harga)</span>
                </ins>
              </span>
              <span class="rating">
                <a href="#">3 Reviews</a>
              </span>
              <p class="short-description">{{ $product->deskripsi }}</p>


              <div class="product-actions">
                <span>Qty:</span>

                <div class="quantity buttons_added">                  
                  <input type="number" step="1" min="0" value="1" title="Qty" class="input-text qty text jumlah" />
                  <div class="quantity-adjust">
                    <a href="#" class="plus">
                      <i class="fa fa-angle-up"></i>
                    </a>
                    <a href="#" class="minus">
                      <i class="fa fa-angle-down"></i>
                    </a>
                  </div>
                </div>

                <a href="#" class="btn btn-dark btn-lg add-to-cart"><span>Add to Cart</span></a>

                <a href="#" class="product-add-to-wishlist"><i class="fa fa-heart"></i></a>                          
              </div>
              

              <div class="product_meta">
                <span class="brand_as">Category: <a href="#">{{ $product->category->nama_kategori }}</a></span>             
              </div>

              <!-- Accordion -->
              <div class="panel-group accordion mb-50" id="accordion">

                <div class="panel">
                  <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="plus">Information<span>&nbsp;</span>
                    </a>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                      <table class="table shop_attributes">
                        <tbody>
                          <tr>
                            <th>Stok:</th>
                            <td>{{ $product->stok }}</td>
                          </tr>
                          <tr>
                            <th>Diskon:</th>
                            <td>{{ $product->diskon }}</td>
                          </tr>                                    
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="panel">
                  <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="plus">Reviews<span>&nbsp;</span>
                    </a>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="reviews">
                        <ul class="reviews-list">
                          <li>
                            <div class="review-body">
                              <div class="review-content">
                                <p class="review-author"><strong>Alexander Samokhin</strong> - May 6, 2014 at 12:48 pm</p>
                                <div class="rating">
                                  <a href="#"></a>
                                </div>
                                <p>This template is so awesome. I didn’t expect so many features inside. E-commerce pages are very useful, you can launch your online store in few seconds. I will rate 5 stars.</p>
                              </div>
                            </div>
                          </li>

                          <li>
                            <div class="review-body">
                              <div class="review-content">
                                <p class="review-author"><strong>Christopher Robins</strong> - May 6, 2014 at 12:48 pm</p>
                                <div class="rating">
                                  <a href="#"></a>
                                </div>
                                <p>This template is so awesome. I didn’t expect so many features inside. E-commerce pages are very useful, you can launch your online store in few seconds. I will rate 5 stars.</p>
                              </div>
                            </div>
                          </li>

                        </ul>         
                      </div> <!--  end reviews -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="socials-share clearfix">
                <span>Share:</span>
                <div class="social-icons nobase">
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-google"></i></a>
                  <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
              </div>
            </div> <!-- end col product description -->
          </div> <!-- end row -->
         
        </div> <!-- end container -->
      </section> <!-- end single product -->

@endsection

@push('js')
    <script>
      $(function(){
        $('.add-to-cart').click(function(e){

          user_id = {{ auth()->user()->id }}
          product_id = {{ $product->id }}
          is_checkout = 0
          jumlah = $('.jumlah').val()
          total = {{ $product->harga }}*jumlah

          $.ajax({
            url : '/addToCart',
            method : "POST",
            headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            data : {
              user_id,
              product_id,
              is_checkout,
              jumlah,
              total,
            },
            success : function(data){
              window.location.href = '/cart'
            }
          });
        })
      })

    </script>
@endpush