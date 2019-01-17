@section('header')
<div class="row bg-custom">
        <div class="main-wrapper">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 logo padding10 paddingT_only">
                <img src="{{asset('images/logo-shubhkart.png')}}" alt="Shubh Kart" title="Shubh Kart">
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 search padding30 paddingT_only relative">
                <form name="searchshubhkart" id="searchshubhkart" method="post">
                    <input type="text" class="input-540x38" placeholder="Search for products, brands & more" name="search" id="search" value="" />
                    <div class="searchresultlist" style="display:none;width:532px;border:1px solid #dddddd;position:absolute;left:0px;top:68px;background-color: #ffe888;z-index:10;padding:8px;"></div>
                </form>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 top-header-links padding30 paddingT_only text-right">
                <ul>
                    <li><img src="{{asset('images/icon-FR.png')}}">&nbsp;Free Returns</li>
                    <li><img src="{{asset('images/icon-IS.png')}}">&nbsp;International Shipping</li>
                    <li><img src="{{asset('images/icon-COD.png')}}">&nbsp;Cash On Delivery</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="main-wrapper">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 navigation">
                    <ul><li><a href="{{ url('')}}" class="home"><img src="{{ url('images/icon-home.png')}}" alt="Home" title="Home"></a></li>
                        <?php 
                            echo $menuhtml;
                         ?>
                         <li><a href="#" class="more">More&nbsp;&nbsp;&nbsp;<img src="{{ url('images/more-down-arrow.png') }}"></a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 navigation text-right">
                    <div class="login">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/home') }}" class="">Home</a> / <a href="{{ url('/logout') }}" class="">Logout</a>
                            @else
                                <a href="{{ route('login') }}" class="">Login</a> / <a href="{{ route('register') }}" class="">Register</a>
                            @endauth
                        @endif
                    </div>
                    <div class="relative whishlist right-links"><img src="{{ url('images/icon-hart.png') }}"><span class="absolute whishlist-bg">1</span></div>
                    <div class="relative cart right-links"><img src="{{ url('images/icon-cart.png') }}"><span class="absolute cart-bg">1</span></div>
                </div>
            </div>
        </div>
    </div>

<?php
//$user = Auth::user();
//pr($user);
 ?>
        
@show