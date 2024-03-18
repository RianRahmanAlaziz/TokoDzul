@extends('layouts.main')

@section('container')
        <!-- Page Title -->
        <section class="page-title text-center bg-light">
          <div class="container relative clearfix">
            <div class="title-holder">
              <div class="title-text">
                <h1 class="uppercase">Shopping</h1>
                <ol class="breadcrumb">
                  <li>
                    <a href="/">Home</a>
                  </li>
                  <li class="active">
                    Shopping
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </section>
        
    <!-- Catalogue -->
    <section class="section-wrap pt-80 pb-40 catalogue">
      <div class="container relative">

        <!-- Filter -->          
        <div class="shop-filter">
          <div class="view-mode hidden-xs">
            <span>View:</span>
            <a class="grid grid-active" id="grid"></a>
            <a class="list" id="list"></a>
          </div>
          <div class="filter-show hidden-xs">
            <span>Show:</span>
            <a href="#" class="active">12</a>
            <a href="#">24</a>
            <a href="#">all</a>
          </div>

        </div>

        <div class="row">
          <div class="col-md-9 catalogue-col right mb-50">
            <div class="shop-catalogue grid-view">

              <div class="row items-grid">
                @foreach ($products as $product)
                <div class="col-md-4 col-xs-6 product product-grid">
                  <div class="product-item clearfix">
                    <div class="product-img hover-trigger">
                      <a href="/shop/{{ $product->slug }}">
                        <img src="/img/product/{{ $product->gambar }}" alt="{{ $product->nama_produk }}">
                      </a>

                      <div class="hover-2">                    
                        <div class="product-actions">
                          <a href="#" class="product-add-to-wishlist">
                            <i class="fa fa-heart"></i>
                          </a>
                        </div>                        
                      </div>
                      <a href="/shop/{{ $product->slug }}" class="product-quickview">Quick View</a>
                    </div>

                    <div class="product-details">
                      <h3 class="product-title">
                        <a href="/shop/{{ $product->slug }}">{{ $product->nama_produk }}</a>
                      </h3>
                      <span class="category">
                        <a href="catalogue-grid.html">{{ $product->nama_produk }}</a>
                      </span>
                    </div>

                    <span class="price">

                      <ins>
                        <span class="amount">@rupiah($product->harga)</span>
                      </ins>                        
                    </span>

                    <div class="product-description">
                      <h3 class="product-title">
                        <a href="/shop/{{ $product->slug }}">{{ $product->nama_produk }}</a>
                      </h3>
                      <span class="price">

                        <ins>
                          <span class="amount">@rupiah($product->harga)</span>
                        </ins>                        
                      </span>
                      <span class="rating">
                        <a href="#">5 Reviews</a>
                      </span>
                      <div class="clear"></div>
                      <p>Zenna Shop is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes store with this Theme is easy than you can imagine. Grab this theme now.</p>
                      <a href="#" class="btn btn-dark btn-md left"><span>Add to Cart</span></a>
                      <div class="product-add-to-wishlist">
                        <a href="#"><i class="fa fa-heart"></i></a>
                      </div>
                    </div>                      

                  </div>
                </div> <!-- end product -->
                @endforeach

              </div> <!-- end row -->
            </div> <!-- end grid mode -->
            
            <!-- Pagination -->
            <div class="pagination-wrap clearfix">
              <p class="result-count">Showing: 12 of 80 results</p>                 
              <nav class="pagination right clearfix">
                <a href="#"><i class="fa fa-angle-left"></i></a>
                <span class="page-numbers current">1</span>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#"><i class="fa fa-angle-right"></i></a>
              </nav>
            </div>

          </div> <!-- end col -->


          <!-- Sidebar -->
          <aside class="col-md-3 sidebar left-sidebar">

            <!-- Categories -->
            <div class="widget categories">
              <h3 class="widget-title heading uppercase relative bottom-line full-grey">Categories</h3>
              <ul class="list-dividers">
                @foreach ($categories as $category)
                <li>
                    <a href="#">{{ $category->nama_kategori }}</a><span>(12)</span>
                </li>
                @endforeach
                
              </ul>
            </div>



            <!-- Tags -->
            <div class="widget tags clearfix">
              <h3 class="widget-title heading uppercase relative bottom-line full-grey">Tags</h3>
              <a href="#">Multi-purpose</a>
              <a href="#">Creative</a>
              <a href="#">Elegant</a>
            </div>

          </aside> <!-- end sidebar -->

        </div> <!-- end row -->
      </div> <!-- end container -->
    </section> <!-- end catalog -->

@endsection