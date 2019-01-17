<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="/images/epic-fv.png">
    <title>EPIC Channel</title>
    <!-- Bootstrap Core CSS -->
    <link href="/theme/css/bootstrap.min.css" rel="stylesheet">
    <!-- Footable CSS -->
    <link href="/theme/css/footable.core.css" rel="stylesheet">
    <link href="/theme/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- Menu CSS -->
    <link href="/theme/css/sidebar-nav.min.css" rel="stylesheet">
    <link href="/theme/css/dropify.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="/theme/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/theme/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="/theme/css/megna-dark.css" rel="stylesheet">
    <link href="/theme/css/material-design-iconic-font.min.css" rel="stylesheet">
    <link href="/theme/css/materialdesignicons.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<!-- style for autocomplete <li> dropdown -->
<style type="text/css">
    .ui-autocomplete .ui-menu-item{
        background: white;
        padding: 5px;
        cursor: pointer;
    }
</style>
<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part" style="background-color: #2f323e;">
                    <a class="logo" href="{{ config('globals.site_url_cms') }}admin/">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="/images/epic-fv.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="/images/epic-fv.png" alt="home" class="light-logo" width="33" height="31"/>
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="{{ config('globals.site_url_cms') }}theme/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="/images/epic-Recovered.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="/theme/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{\Auth::user()->display_name}}</b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="/theme/varun.jpg" alt="user" /></div>
                                    <div class="u-text">
                                        <h4>{{\Auth::user()->display_name}}</h4>
                                        <p class="text-muted">{{\Auth::user()->user_email}}</p><a href="{{ config('globals.site_url_cms') }}admin/users/" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ config('globals.site_url_cms') }}admin/users/"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
                <ul class="nav" id="side-menu">
                    <li> <a href="{{ config('globals.site_url_cms') }}admin/" class="waves-effect"><i class="mdi mdi-apps fa-fw" data-icon="v"></i> <span class="hide-menu">Dashboard</span></a></li>
                    <li> <a href="{{ config('globals.site_url_cms') }}ingest/" class="waves-effect"><i class="mdi mdi-server-network fa-fw"></i> <span class="hide-menu">Ingest</span></a></li>
                    <li><a href="#" class="waves-effect"><i class="mdi mdi-view-list fa-fw"></i> <span class="hide-menu">Catalog Type<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ config('globals.site_url_cms') }}catalog-type/catalog/" class="waves-effect"><i class="mdi mdi-view-list fa-fw"></i>Catalog</a>
                        </li>
                        <li>
                            <a href="{{ config('globals.site_url_cms') }}catalog-type/genre/" class="waves-effect"><i class="mdi mdi-view-list fa-fw"></i>Genre</a>
                        </li>
                        </ul>
                    </li>
                    <li class="side-cat"><a href="#" class="waves-effect"><i class="mdi mdi-view-list fa-fw" ></i> <span class="hide-menu">Catalogs<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            @foreach(\App\Catalogs::where('type','catalog')->get() as $catalog_item)
                             <li> <a {{ Request::is('/') ? ' class="active"' : null }} href="{{ route('catalog.lists', array('catalog_id'=>$catalog_item->ID,'parent_id'=>0)) }}" class="waves-effect"><i class="mdi {{$catalog_item->menu_icon}} fa-fw"></i> <span class="hide-menu">{{$catalog_item->name}}<span class="label label-rouded label-info pull-right"></span> </span></a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="#" class="waves-effect"><i class="mdi mdi-webpack fa-fw"></i> <span class="hide-menu">CMS<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="{{ config('globals.site_url_cms') }}cms/hotspots/" class="waves-effect"><i class="mdi mdi-trophy-award fa-fw"></i> <span class="hide-menu">Hotspots<span class="label label-rouded label-info pull-right"><?php $content_data =  \App\Hotspots::all();echo count($content_data);?></span> </span></a></li>
                            <li> <a href="{{ config('globals.site_url_cms') }}cms/banners/" class="waves-effect"><i class="mdi mdi-tooltip-image fa-fw"></i> <span class="hide-menu">Banners<span class="label label-rouded label-info pull-right"></span></span></a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="waves-effect"><i class="mdi mdi-ticket fa-fw"></i> <span class="hide-menu">Subscriptions<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="{{ config('globals.site_url_cms') }}subscriptions/users/" class="waves-effect"><i class="mdi mdi-account-multiple fa-fw"></i> <span class="hide-menu">Users<span class="label label-rouded label-info pull-right">09</span> </span></a></li>
                            <li> <a href="{{ config('globals.site_url_cms') }}subscriptions/subscription/" class="waves-effect"><i class="mdi mdi-bookmark-check fa-fw"></i> <span class="hide-menu">Subscription<span class="label label-rouded label-info pull-right">45</span></span></a></li>
                            <li> <a href="{{ config('globals.site_url_cms') }}subscriptions/orders/" class="waves-effect"><i class="mdi mdi-wallet fa-fw"></i> <span class="hide-menu">Orders<span class="label label-rouded label-info pull-right">3</span></span></a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="waves-effect"><i class="mdi mdi-worker fa-fw"></i> <span class="hide-menu">Admin Users<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="{{ config('globals.site_url_cms') }}admin/users/" class="waves-effect"><i class="mdi mdi-account-multiple-outline fa-fw"></i> <span class="hide-menu">Users<span class="label label-rouded label-info pull-right">4</span> </span></a></li>
                            <li> <a href="{{ config('globals.site_url_cms') }}admin/user-role/" class="waves-effect"><i class="mdi mdi-account-star-variant fa-fw"></i> <span class="hide-menu">User Role<span class="label label-rouded label-info pull-right">5</span></span></a></li>
                        </ul>
                    </li>
                    <li class="devider"></li>
                    <li> <a href="{{ config('globals.site_url_cms') }}trash/" class="waves-effect"><i class="mdi mdi-recycle fa-fw"></i> <span class="hide-menu">Recycle<span class="label label-rouded label-info pull-right">5</span></span></a></li>
                </ul>
            </div>
        </div>
        <div id="page-wrapper">
            <div class="container-fluid">