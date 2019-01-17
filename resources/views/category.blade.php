@extends('base')
@section('shubhkart_page_title')
SHUBHKART-HOMETITLE
@stop

@section('shubhkart_content')
    <div class="content_wrapper">
        <?php pr($products); ?>

    </div>
@stop