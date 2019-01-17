@extends('base')
@section('shubhkart_page_title')
Shubh Kart
@stop
@section('shubhkart_content')
    <div class="row hero-image">
        <div class="main-wrapper hero-unit">
            <div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-6 col-md-offset-6 col-sm-offset-6 padding40">
                <div class="hero-unit-text">
                    <div class="hero-image-subtitle">Idolise your space with our</div>
                    <div  class="hero-image-title">Majestic Collection of Scared Idols.</div>
                    <div class="viaw-all"><a href="#" class="text-uppercase">View All</a> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row margin10 marginT_only">
        <div class="main-wrapper idols-widget">
            <div class="row">
                <?php foreach($idolsproducts as $k=>$idol) { 
                    if($k < 4) {
                        $thumb = $idol->mainimage;
                        $thumb = str_replace("http://dev.shubhkart.com/wp-content/uploads/2018/05/","http://localhost/woocommerce/wp-content/uploads/2018/05/",$thumb);
                        if(empty($thumb)){
                            $thumb = "http://localhost/woocommerce/wp-content/uploads/2018/05/category-default.jpg";
                        } 
                        
                ?>
                <div class="col-lg-3 col-md-3 col-sm-3 relative idols-div">
                    <img src="{{ $thumb }}" class="img-responsive" style="widht:298px;height:178px;">
                    <span class="absolute">
                        <span class="idols-title text-uppercase text-center"><?php echo $idol->name; ?></span>
                        <a href="{{ url('/catalog')}}/{{ $idol->slug }}" class="text-uppercase text-center">View All</a>
                    </span>
                </div>
                <?php } } ?>
            </div>
        </div>
    </div>
    <div class="row bg-pink pink-wrapper">
        <div class="main-wrapper padding20 paddingTB_only">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="col-lg-3 col-md-3 col-sm-3 books-section">
                        <div class="titletext relative">
                            <span class="absolute"></span>
                            Books
                        </div>
                        <?php foreach($books_section['categories'] as $book) { ?>
                        <div class="books-list"><a id="<?php echo $book->slug; ?>" href="javascript:void(0);"><?php echo $book->name; ?></a></div>
                        <?php } ?>
                    </div>

                    <?php 
                        //$sectionInitialCategoryId = $books_section['categories'][0]->id;
                        //$sectionInitialCategoryId = str_replace("category_","",$sectionInitialCategoryId);
                        foreach($books_section['categories'] as $i=>$book) {
                            $filenames = $book->attr_thumbnails; $thumbnails = array();
                            foreach($filenames as $f){
                                $without_extension = pathinfo($f, PATHINFO_FILENAME);
                                $dimention = substr($without_extension, strrpos($without_extension, "-")+1); 
                                $thumbnails[$dimention] = $f;
                            }
                            //$thumb = $book->mainimage;
                            $thumb = $thumbnails['256x328'];
                            $thumb = str_replace("http://dev.shubhkart.com/wp-content/uploads/2018/05/","http://localhost/woocommerce/wp-content/uploads/2018/05/",$thumb);
                            if(empty($thumb)){
                                $thumb = "http://localhost/woocommerce/wp-content/uploads/2018/05/category-default-256x328.jpg";
                            } 
                            $display = ($i==0) ? 'display:block;' : 'display:none;';
                    ?>
                    <div class="hideinit category<?php echo $book->slug; ?>" style="<?php echo $display;?>">
                        <div class="col-lg-5 col-md-5 col-sm-5 mind-body-soul">
                            <div class="white-bg">
                                <img src="{{ $thumb }}" class="img-responsive d-inline-block" style="widht:256px !important;height:328px;">
                                <div class="padding10 d-inline-block mind-soul-description">
                                    <div class="text-uppercase padding10 paddingB_only title">
                                        <?php echo $book->name; ?>
                                    </div>
                                    <div class="defaulttext"><?php echo $book->description; ?></div>
                                    <div class="text-center"><a href="{{ url('/catalog')}}/<?php echo $book->slug; ?>" class="text-uppercase">view all product</a></div>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($books_section['categorysortedProducts'][$book->name][0]) ) { ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 paddingR_none right-column">
                            <?php $p1 = $books_section['categorysortedProducts'][$book->name][0]; ?>
                            <div class="padding10 margin20 marginB_only grey-border">
                                <img src="{{ $p1->thumb }}" class="img-responsive" style="widht:130px;height:130px;">
                                <div class="books-disc">
                                    <div class="d-inline-block">
                                        {{ $p1->name }}
                                    </div>
                                    <div class="text-left padding15 paddingTB_only">
                                        <?php if($p1->special_price) { ?>
                                            <span class="actul-amount">₹ {{ $p1->special_price }}</span>
                                            <span class="strike">₹ {{ $p1->mrp }}</span>
                                            <?php $percent1 = (($p1->mrp - $p1->special_price)*100) / $p1->mrp ; ?>
                                            <span class="discount">({{ ceil($percent1) }}% off)</span>
                                        <?php } else { ?>
                                            <span class="actul-amount">₹ {{ $p1->mrp }}</span>
                                        <?php } ?>
                                    </div>
                                    <div class="padding5 paddingT_only btn-view"><a href="{{ $p1->url }}" class="text-uppercase">View</a></div>
                                </div>
                            </div>
                            <?php $p2 = $books_section['categorysortedProducts'][$book->name][1]; ?>
                            <div class="padding10 grey-border">
                                <img src="{{ $p2->thumb }}" class="img-responsive" style="widht:130px;height:130px;">
                                <div class="books-disc">
                                    <div class="d-inline-block">
                                        {{ $p2->name }}
                                    </div>
                                    <div class="text-left padding15 paddingTB_only">
                                        <?php if($p2->special_price) { ?>
                                            <span class="actul-amount">₹ {{ $p2->special_price }}</span>
                                            <span class="strike">₹ {{ $p2->mrp }}</span>
                                            <?php $percent2 = (($p2->mrp - $p2->special_price)*100) / $p2->mrp ; ?>
                                            <span class="discount">({{ ceil($percent2) }}% off)</span>
                                        <?php } else { ?>
                                            <span class="actul-amount">₹ {{ $p2->mrp }}</span>
                                        <?php } ?>
                                    </div>
                                    <div class="padding5 paddingT_only btn-view"><a href="{{ $p2->url }}" class="text-uppercase">View</a></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>    
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
        @foreach ($postcategories as $cat) || {{ $cat->term_id }} ->

            @foreach ($cat->posts as $singlepost)

               <br>postid {{ $singlepost->ID }}
               posttitle {{ $singlepost->title }}

            @endforeach

        @endforeach
    <!--div class="content_wrapper">
        <?php //pr($products);?>
        <div class="left-wrapper">
            <div class="vnav-links">
                <ul>
                    @foreach($catnavigation as $key=>$value)
                    <li><a href="{{ url('/catalog')}}/{{ $value->slug }}/">{{ $value->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="mid-wrapper">
            
        </div>
        <div class="right-wrapper">
            
        </div>
    </div-->
    <script>
        jQuery(document).ready(function($){
            $('.books-list a').on('click',function(){
                var id = $(this).attr('id');
                $('.hideinit').css({'display':'none'});
                $('.category'+id).css({'display':'block'});
            });
        });
    </script>
@stop

