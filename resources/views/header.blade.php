@section('header')
<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ url('/logout') }}">Logout</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
<?php
//$user = Auth::user();
//pr($user);
/*@foreach($categories as $key=>$value)
{{ $key }}
{{ $value->name }}                     
@endforeach*/
?>

            <div class="content">
                <div class="title m-b-md">
                    Shubhkart
                </div>

                <div class="links">
                    @foreach($catnavigation as $key=>$value)
                    <a href="{{ url('/catalog')}}/{{ $value->slug }}/">{{ $value->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
@show