@extends('layouts.main')

@section('container')


      <!-- Hero Slider -->
      <section class="hero-wrap text-center relative">
        <div id="owl-hero" class="owl-carousel owl-theme light-arrows slider-animated">
          @foreach ($sliders as $slider)
          <div class="hero-slide overlay img-fluid" style="background-image:url(img/slider/{{ $slider->gambar }})">
            <div class="container">
              <div class="hero-holder">
                <div class="hero-message">
                  <h1 class="hero-title nocaps">{{ $slider->nama_slider }}</h1>
                  <h2 class="hero-subtitle lines">{{ $slider->deskripsi }}</h2>

                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </section> <!-- end hero slider -->

              <!-- Promo Banners -->
    <section class="section-wrap promo-banners pb-50">
        <div class="container">

          <div class="row heading-row">
            <div class="col-md-12 text-center">
              <h2 class="heading bottom-line">
                Category
              </h2>
            </div>
          </div>

          <div class="row">

            @foreach ($categories as $category)
            <div class="col-xs-4 col-xxs-12 mb-30 promo-banner style-2">
              <a href="#">
                <img src="img/category/{{ $category->gambar }}" alt="" />
                <div class="promo-inner">
                  <h2>{{ $category->nama_kategori }}</h2>
                </div>
              </a>
            </div>
            @endforeach
  
          </div>
        </div>
      </section>
      <!-- end promo banners -->

            <!-- Trendy Products -->
            <section class="section-wrap-sm new-arrivals pb-50">
              <div class="container">
      
                <div class="row heading-row">
                  <div class="col-md-12 text-center">
                    <h2 class="heading bottom-line">
                      products
                    </h2>
                  </div>
                </div>
      
                <div class="row items-grid">   

                  @foreach ($products as $product)
                  <div class="col-md-3 col-xs-6">
                    <div class="product-item hover-trigger">
                      <div class="product-img">
                        <a href="shop-single.html">
                          <img src="/img/product/{{ $product->gambar }}" alt="{{ $product->nama_produk }}">
                        </a>
                        <div class="hover-overlay">                    
                          <div class="product-actions">
                            <a href="#" class="product-add-to-wishlist">
                              <i class="fa fa-heart"></i>
                            </a>
                          </div>
                          <div class="product-details valign">
                            <span class="category">
                              <a href="#">{{ $product->category->nama_kategori }}</a>
                            </span>
                            <h3 class="product-title">
                              <a href="/shop/{{ $product->slug }}">{{ $product->nama_produk }}</a>
                            </h3>
                            <span class="price">
                              <ins>
                                <span class="amount">@rupiah($product->harga)</span>
                              </ins>
                            </span>
                            <div class="btn-quickview">
                              <a href="/shop/{{ $product->slug }}" class="btn btn-md btn-color">
                              <span>Quickview</span>
                            </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach

                </div> <!-- end row -->
              </div>
            </section> <!-- end trendy products -->
      

      
            </section> <!-- end testimonials -->

@endsection
