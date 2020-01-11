  <!-- header area start -->
  <header class="short-stor">
    <div class="container-fluid">
        <div class="row">
            <!-- logo start -->
            <div class="col-md-3 col-sm-12 text-center nopadding-right">
                <div class="top-logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('img/logo.jpg') }}" alt="" /></a>
                </div>
            </div>
            <!-- logo end -->
            <!-- mainmenu area start -->
            <div class="col-md-6 text-center">
                <div class="mainmenu">
                    <nav>
                        <ul>
                            <li class="expand"><a href="{{ route('home') }}">Trang Chủ</a></li>
                            <li class="expand"><a href="#">Sản Phẩm</a>
                                <ul class="restrain sub-menu">
                                  @if (isset($categories))
                                  @foreach ($categories as $c_item)
                                  <li>
                                    <a style="padding: 2px 10px; font-size: 18px;" href="{{ route('get.list.product', [$c_item -> c_slug, $c_item -> id]) }}"> <i class="{{$c_item -> c_icon}}"></i>  {{$c_item -> c_name}}</a>
                                </li>
                                @endforeach
                                @endif
                            </ul>   
                        </li>
                        <li class="expand"><a href="{{ route('get.list.article') }}">Tin Tức</a></li>
                        <li class="expand"><a href="#">Giới Thiệu</a></li>
                        <li class="expand"><a href="{{ route('get.contact') }}">Liên Hệ</a></li>

                          {{--   <li class="expand"><a href="#">Pages</a>
                                <ul class="restrain sub-menu">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                    <li><a href="shop-list.html">Shop List</a></li>
                                    <li><a href="cart.html">Shopping cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="404.html">404 Error</a></li>
                                </ul>                                   
                            </li> --}}
                         {{--    <li class="expand"><a href="about-us.html">About</a></li>
                         <li class="expand"><a href="contact-us.html">Contact</a></li> --}}
                     </ul>
                 </nav>
             </div>
             <!-- mobile menu start -->
             <div class="row">
                <div class="col-sm-12 mobile-menu-area">
                    <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                        <span class="mobile-menu-title">Menu</span>
                        <nav>
                            <ul>
                                <li ><a href="{{ route('home') }}">Trang Chủ</a></li>
                                <li ><a href="#">Sản Phẩm</a>
                                    <ul>
                                      @if (isset($categories))
                                      @foreach ($categories as $c_item)
                                      <li>
                                        <a href="{{ route('get.list.product', [$c_item -> c_slug, $c_item -> id]) }}">   {{$c_item -> c_name}}
                                        </a>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>   
                            </li>
                            <li ><a href="{{ route('get.list.article') }}">Tin Tức</a></li>
                            <li ><a href="#">Giới Thiệu</a></li>
                            <li ><a href="{{ route('get.contact') }}">Liên Hệ</a></li>

                          {{--   <li class="expand"><a href="#">Pages</a>
                                <ul class="restrain sub-menu">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                    <li><a href="shop-list.html">Shop List</a></li>
                                    <li><a href="cart.html">Shopping cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="404.html">404 Error</a></li>
                                </ul>                                   
                            </li> --}}
                         {{--    <li class="expand"><a href="about-us.html">About</a></li>
                         <li class="expand"><a href="contact-us.html">Contact</a></li> --}}
                     </ul>
                 </nav>
                 {{-- <nav>
                    <ul>
                        <li><a href="index.html">Home</a>
                            <ul>
                                <li><a href="index-2.html">Home 2</a></li>
                                <li><a href="index-3.html">Home 3</a></li>
                                <li><a href="index-4.html">Home 4</a></li>
                                <li><a href="index-5.html">Home 5</a></li>
                                <li><a href="index-6.html">Home 6</a></li>
                                <li><a href="index-7.html">Home 7</a></li>
                                <li><a href="index-8.html">Home 8</a></li>
                            </ul>
                        </li>
                        <li><a href="shop-grid.html">Man</a>
                            <ul>
                                <li><a href="shop-grid.html">Dresses</a>
                                    <ul>
                                        <li><a href="shop-grid.html">Coctail</a></li>
                                        <li><a href="shop-grid.html">Day</a></li>
                                        <li><a href="shop-grid.html">Evening </a></li>
                                        <li><a href="shop-grid.html">Sports</a></li>
                                    </ul>
                                </li>
                                <li><a class="mega-menu-title" href="shop-grid.html"> Handbags </a>
                                    <ul>
                                        <li><a href="shop-grid.html">Blazers</a></li>
                                        <li><a href="shop-grid.html">Table</a></li>
                                        <li><a href="shop-grid.html">Coats</a></li>
                                        <li><a href="shop-grid.html">Kids</a></li>
                                    </ul>
                                </li>
                                <li><a class="mega-menu-title" href="shop-grid.html"> Clothing </a>
                                    <ul>
                                        <li><a href="shop-grid.html">T-Shirt</a></li>
                                        <li><a href="shop-grid.html">Coats</a></li>
                                        <li><a href="shop-grid.html">Jackets</a></li>
                                        <li><a href="shop-grid.html">Jeans</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="shop-list.html">Women</a>
                            <ul>
                                <li><a href="shop-grid.html">Rings</a>
                                    <ul>
                                        <li><a href="shop-grid.html">Coats & Jackets</a></li>
                                        <li><a href="shop-grid.html">Blazers</a></li>
                                        <li><a href="shop-grid.html">Jackets</a></li>
                                        <li><a href="shop-grid.html">Rincoats</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop-grid.html">Dresses</a>
                                    <ul>
                                        <li><a href="shop-grid.html">Ankle Boots</a></li>
                                        <li><a href="shop-grid.html">Footwear</a></li>
                                        <li><a href="shop-grid.html">Clog Sandals</a></li>
                                        <li><a href="shop-grid.html">Combat Boots</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop-grid.html">Accessories</a>
                                    <ul>
                                        <li><a href="shop-grid.html">Bootees bags</a></li>
                                        <li><a href="shop-grid.html">Blazers</a></li>
                                        <li><a href="shop-grid.html">Jackets</a></li>
                                        <li><a href="shop-grid.html">Jackets</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop-grid.html">Top</a>
                                    <ul>
                                        <li><a href="shop-grid.html">Briefs</a></li>
                                        <li><a href="shop-grid.html">Camis</a></li>
                                        <li><a href="shop-grid.html">Nigntwears</a></li>
                                        <li><a href="shop-grid.html">Shapewears</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="shop-grid.html">Shop</a>
                            <ul>
                                <li><a href="shop-list.html">Shop Pages</a>
                                    <ul>
                                        <li><a href="shop-list.html">List View </a></li>
                                        <li><a href="shop-grid.html">Grid View</a></li>
                                        <li><a href="login.html">My Account</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="cart.html">Cart </a></li>
                                        <li><a href="checkout.html">Checkout </a></li>
                                    </ul>
                                </li>
                                <li><a href="product-details.html">Product Types</a>
                                    <ul>
                                        <li><a href="product-details.html">Simple Product</a></li>
                                        <li><a href="product-details.html">Variables Product</a></li>
                                        <li><a href="product-details.html">Grouped Product</a></li>
                                        <li><a href="product-details.html">Downloadable</a></li>
                                        <li><a href="product-details.html">Virtual Product</a></li>
                                        <li><a href="product-details.html">External Product</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul>
                                <li><a href="shop-grid.html">Shop Grid</a></li>
                                <li><a href="shop-list.html">Shop List</a></li>
                                <li><a href="product-details.html">Product Details</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="cart.html">Shopping cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="404.html">404 Error</a></li>
                            </ul>                                                   
                        </li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                    </ul>
                </nav> --}}
            </div>                      
        </div>
    </div>
    <!-- mobile menu end -->
</div>
<!-- mainmenu area end -->
<!-- top details area start -->
<div class="col-md-3 col-sm-12 nopadding-left">
    <div class="top-detail">
        <!-- language division start -->
                    {{-- <div class="disflow">
                        <div class="expand lang-all disflow">
                            <a href="#"><img src="img/country/en.gif" alt="">English</a>
                            <ul class="restrain language">
                                <li><a href="#"><img src="img/country/it.gif" alt="">italiano</a></li>
                                <li><a href="#"><img src="img/country/nl_nl.gif" alt="">Nederlands</a></li>
                                <li><a href="#"><img src="img/country/de_de.gif" alt="">Deutsch</a></li>
                                <li><a href="#"><img src="img/country/en.gif" alt="">English</a></li>
                            </ul>
                        </div>
                        <div class="expand lang-all disflow">
                            <a href="#">$ USD</a>
                            <ul class="restrain language">
                                <li><a href="#">€ Eur</a></li>
                                <li><a href="#">$ USD</a></li>
                                <li><a href="#">£ GBP</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <!-- language division end -->
                    <!-- addcart top start -->
                    <div class="disflow">
                        <div class="circle-shopping expand">
                            <div class="shopping-carts text-right">
                                <div class="cart-toggler">
                                    <a href="{{ route('list.shopping.cart') }}"><i class="icon-bag"></i></a>
                                    <a href="{{ route('list.shopping.cart') }}"><span class="cart-quantity">{{Cart::count()}}</span></a>
                                </div>
                                <div class="restrain small-cart-content" style="top: 133%;">
                                    <ul class="cart-list">
                                        @foreach (Cart::content() as $cart_item)
                                        <li>
                                            <a class="sm-cart-product" href="{{ route('list.shopping.cart') }}">
                                                <img src="{{ asset(pare_url_file($cart_item -> options -> avatar)) }}" width="50px" height="50px" alt="">
                                            </a>
                                            <div class="small-cart-detail">
                                                <a class="remove" href="{{ route('delete.shopping.cart', $cart_item -> rowId) }}"><i class="fa fa-times-circle"></i></a>
                                                <a href="#" class="edit-btn"><img src="{{ asset('img/btn_edit.gif') }}" alt="Edit Button" /></a>
                                                <a class="small-cart-name" href="{{ route('list.shopping.cart') }}">{{$cart_item -> name}}</a>
                                                <span class="quantitys"><strong>{{$cart_item -> qty}}</strong>x<span>{{$cart_item -> price}}</span></span>
                                            </div>
                                        </li>
                                        @endforeach                                        
                                    </ul>
                                    <p class="total">Tổng Tiền: <span class="amount">{{Cart::subTotal()}}</span></p>
                                    <p class="buttons">
                                        <a href="{{ route('get.form.pay') }}" class="button">Thanh Toán</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- addcart top start -->
                    <!-- search divition start -->
                    <div class="disflow">
                        <div class="header-search expand">
                            <div class="search-icon fa fa-search"></div>
                            <div class="product-search restrain" style=" top: 133%;">
                                <div class="container nopadding-right" s{{-- tyle="width:660px"; --}}>
                                    <form action="{{ route('get.search.product') }}" id="searchform" method="GET">
                                        <div class="input-group">
                                            <input type="text" name="keySearch" id="keySearch" class="form-control" maxlength="128"  placeholder="Tìm Kiếm" style="background-color: white;">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <div class="product-search restrain form-search" id="form_search" style=" display:none;position: absolute;padding-top: 5px; margin-top: 5px; background-color: #3f3f3f;">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end search divition start -->
                    @if (Auth::check())
                    <div class="disflow" style="padding: 0px 0px 0px 10px;">
                       Xin Chào:<p style="font-weight: bold;">{{ Auth::user()->name}}</p>
                   </div>
                   @endif
                   <!-- search divition end -->
                   <div class="disflow">
                    <div class="expand dropps-menu">
                        <a href="#" style="font-size: 18px;"><i class="fa fa-align-justify"></i></a>
                        @if (Auth::check())
                        <ul class="restrain language">
                            <li><a href="{{ route('get.user') }}">Quản Lý Đơn Hàng </a></li>
                            <li><a href="{{ route('get.info.user') }}">Thông Tin Tài Khoản </a></li>
                            <li><a href="cart.html">Giỏ Hàng</a></li>
                            <li><a href="{{ route('get.logout') }}">Thoát</a></li>
                        </ul>
                        @else
                        <ul class="restrain language">
                            <li><a href="{{ route('get.login') }}">Đăng Nhập</a></li>
                            <li><a href="{{ route('get.register') }}">Đăng Ký</a></li>
                        </ul>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <!-- top details area end -->
    </div>
</div>
</header>
<!-- header area end -->