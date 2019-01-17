@section('footer')
<div class="row">
        <div class="main-wrapper grey-border borderB_only padding40 paddingTB_only about-shubhkart">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 titletext relative text-center">
                    <span class="text-uppercase">about</span>
                    <span class="text-uppercase">shubh</span>
                    <span class="text-uppercase">kart</span>
                    <span class="absolute"></span>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 defaulttext text-center">
                    Shubhkart.com is a dedicated spiritual online marketplace for spiritual and religious products. E-commerce marketplace is growing rapidly in India and has made way for new business opportunities, keeping Sanskar's brand and spiritual genre in mind we have come out with this Idea to provide an e-commerce platform, this will be supported by Sanskar. We cater to more than 18 different categories, which include Pooja Products, Rudraksha, Yantra, Idols, Religious books and Devotional CDs, Temple Prasads and other such products.
                    <br><br>
                    Shubhkart.com is a young and vibrant company that aims to provide good quality spiritual products. At Shubhkart.com we strive to achieve the highest level of “Customer Satisfaction” possible.  Our cutting edge E-commerce platform, highly experienced backend team and state of the art customer care centre provides customer with:
                    <br><br>
                    Broader selection of products  |  Superior buying experience  |  On-time delivery of products  |  Quick resolution of any concerns
                </div>
            </div>
        </div>
        <div class="main-wrapper grey-border borderB_only padding20 paddingTB_only about-shubhkart">
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul>
                        <li>
                            <div class="heading">Company</div>
                            <a href="{{ url('/about-us')}}" class="">About Us</a>
                            <a href="{{ url('/career')}}" class="">Career</a>
                            <a href="{{ url('/blog')}}" class="">Blog</a>
                            <a href="{{ url('/sitemap')}}" class="">Sitemap</a>
                        </li>
                        
                        <li>
                            <div class="heading">Policies and Information</div>
                            <a href="{{ url('/privacy-policy')}}" class="">Privacy Policy</a>
                            <a href="{{ url('/shipping-and-tracking')}}" class="">Shipping and Tracking</a>
                            <a href="{{ url('/recharge-and-exchange')}}" class="">Return and Exchange</a>
                            <a href="{{ url('/refund-and-cancellation')}}" class="">Refund and cancellation</a>
                        </li>
                        
                        <li>
                            <div class="heading">Payment Methods</div>
                            <a href="{{ url('/net-banking')}}" class="">Net Banking</a>
                            <a href="{{ url('/cash-on-delivery')}}" class="">Cash On Delivery</a>
                            <a href="{{ url('/debit-credit-card')}}" class="">Debit/Credit Card</a>
                        </li>
                        
                        <li>
                            <div class="heading">Need Help </div>
                            <a href="{{ url('/91-8108110071')}}" class="">+91-8108110071</a>
                            <a href="{{ url('/contact-us')}}" class="">Contact Us</a>
                            <a href="{{ url('/faqs')}}" class="">FAQs</a>
                        </li>
                        
                        <li>
                            <div class="heading">Stay Connected</div>
                            <div>Sign up for our Newsletter</div>
                            <div><img src="{{asset('images/input-img.jpg')}}" class="img-responsive"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row bg-pink pink-wrapper">
        <div class="main-wrapper padding20 paddingTB_only">
            <div class="row all-categories">
                <div class="col-lg-12 col-md-12 col-sm-12 head-label"> All categories :</div>
                <?php echo $footermenuhtml; ?>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="main-wrapper grey-border borderB_only padding10 paddingTB_only footer">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 text-left">
                    <ul>
                        <span>Our Network Sites:</span>
                        <li><a href="http://pittiegroup.com/">PITTIE GROUP</a></li>
                        <li><a href="http://shubhtv.com/">SHUBHTV</a></li>
                        <li><a href="https://www.latestly.com/">LATESTLY</a></li>
                        <li><a href="http://www.epicchannel.com/">EPIC CHANNEL</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 text-right copyright-text">
                    Copyright @ 2017 shubhkart.com All rights reserved
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="{{asset('js/owl.carousel.js')}}" ></script>
    
<script>
$(function(){
    $('.trending-owl-carousel').owlCarousel({
        margin:25,
        nav:true,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
    
    $('.main-carousel').owlCarousel({
        margin:0,
        nav:false,
        dots: true,
        loop:true,
        autoplay:true,
        autoplayTimeout:5000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:1
            }
        }
    })
    
});
</script>
<script>
    jQuery(document).ready(function($){
        $('input[name="search"]').on('change',function(e){
            //var selectedVal = $('input[name="search"]').val();
            e.preventDefault();
            var selectedVal = $(this).val();
            if(selectedVal.length >= 3){
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                 $.ajax({
                    url: '{{url("/search")}}',
                    //dataType: 'json',
                    method: 'post',
                    contentType: 'application/x-www-form-urlencoded',
                    data: {
                        search : selectedVal
                    },//$(this).serialize(),
                    success: function( response, textStatus, jQxhr ){
                        //console.log(response); 
                        $('.searchresultlist').html( response );
                        $('.searchresultlist').css({'display':'block'});
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });
            }    
        });
    });
</script>
@show