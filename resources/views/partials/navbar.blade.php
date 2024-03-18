<header class="nav-type-1">

  <!-- Fullscreen search -->
  <div class="search-wrap">
    <div class="search-inner">
      <div class="search-cell">
        <form method="get">
          <div class="search-field-holder">
            <input type="search" class="form-control main-search-input" placeholder="Search for" />
            <i class="ui-close search-close" id="search-close"></i>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end fullscreen search -->



  <nav class="navbar navbar-static-top">
    <div class="navigation" id="sticky-nav">
      <div class="container relative">
        <div class="row flex-parent">
          <div class="navbar-header flex-child">
            <!-- Logo -->
            <div class="logo-container">
              <div class="logo-wrap">
                <a href="/">
                  <img class="logo-dark" src="/img/logo.png" alt="logo" />
                </a>
              </div>
            </div>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Mobile cart -->
            <div class="nav-cart mobile-cart hidden-lg hidden-md">
              <div class="nav-cart-outer">
                <div class="nav-cart-inner">
                  <a href="#" class="nav-cart-icon">
                    <span class="nav-cart-badge">2</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- end navbar-header -->

          <div class="nav-wrap flex-child">
            <div class="collapse navbar-collapse text-center" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="/">Home</a>
                  <i class="fa fa-angle-down dropdown-trigger"></i>
                </li>

                <li class="dropdown">
                  <a href="#">Pages</a>
                  <i class="fa fa-angle-down dropdown-trigger"></i>
                  <ul class="dropdown-menu">
                    <li><a href="about-us.html">About Us</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="faq.html">F.A.Q</a></li>
                    <li><a href="404.html">404</a></li>
                  </ul>
                </li>


                <li class="dropdown">
                  <a href="/shop">Shop</a>
                  <i class="fa fa-angle-down dropdown-trigger"></i>

                </li>

                <li class="dropdown">
                  <a href="#">Elements</a>
                  <i class="fa fa-angle-down dropdown-trigger"></i>
                  <ul class="dropdown-menu">
                    <li><a href="shortcodes.html">Shortcodes</a></li>
                    <li><a href="typography.html">Typography</a></li>
                  </ul>
                </li>
                <!-- end elements -->

                <li class="mobile-links hidden-lg hidden-md">
                  <a href="#">My Account</a>
                </li>

                <!-- Mobile search -->
                <li id="mobile-search" class="hidden-lg hidden-md">
                  <form method="get" class="mobile-search">
                    <input type="search" class="form-control" placeholder="Search..." />
                    <button type="submit" class="search-button">
                      <i class="fa fa-search"></i>
                    </button>
                  </form>
                </li>
              </ul>
              <!-- end menu -->
            </div>
            <!-- end collapse -->
          </div>
          <!-- end col -->

          <div class="flex-child flex-right nav-right hidden-sm hidden-xs">
            <ul>
              @auth
              <li class="nav-register dropdown">
                <a href="/dashboard" >{{ auth()->user()->username }}</a>

                {{-- <ul class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <li>
                            <a href="/">
                            Home
                            </a>
                        </li>

                        <li>
                          <a href="#" data-toggle="modal" data-target="#logoutModal">
                            Logout
                        </a>
                        </li>

                    </ul> --}}
              </li>
              @else
              <li class="nav-login">
                <a href="#" data-toggle="modal" data-target="#exampleModal">Login</a>
              </li>
              @endauth
              
              <li class="nav-search-wrap style-2 hidden-sm hidden-xs">
                <a href="#" class="nav-search search-trigger">
                  <i class="fa fa-search"></i>
                </a>
              </li>
              <li class="nav-cart">
                <div class="nav-cart-outer">
                  <div class="nav-cart-inner">
                    <a href="/cart" class="nav-cart-icon"></a>
                  </div>
                </div>
                <div class="nav-cart-container">
                  <div class="nav-cart-items">

                    <div class="nav-cart-item clearfix">
                      <div class="nav-cart-img">
                        <a href="#">
                          <img src="/img/shop/shop_item_2.jpg" alt="" />
                        </a>
                      </div>
                      <div class="nav-cart-title">
                        <a href="#"> Sequin Suit longer title </a>
                        <div class="nav-cart-price">
                          <span>1 x</span>
                          <span>1250.00</span>
                        </div>
                      </div>
                      <div class="nav-cart-remove">
                        <a href="#" class="remove"><i class="ui-close"></i></a>
                      </div>
                    </div>
                  </div>
                  <!-- end cart items -->

                  <div class="nav-cart-summary">
                    <span>Cart Subtotal</span>
                    <span class="total-price">$1799.00</span>
                  </div>

                  <div class="nav-cart-actions mt-20">
                    <a href="/cart" class="btn btn-md btn-dark"><span>View Cart</span></a>
                    <a href="/checkout" class="btn btn-md btn-color mt-10"><span>Proceed to Checkout</span></a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </div>
    <!-- end navigation -->
  </nav>
  <!-- end navbar -->
</header>