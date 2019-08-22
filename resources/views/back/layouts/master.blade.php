
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title') -  @if(isset($sitesettings->title)) {{$sitesettings->title}} @endif</title>
    <link href="{{ asset('admin/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/cairo.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
</head>


<body>

<div id="wrapper">

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}">@if(isset($sitesettings->title)) {{$sitesettings->title}} @endif - لوحة التحكم</a>
        </div>


        @guest
@else
<ul class="nav navbar-top-links navbar-left">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            {{Auth::user()->name}}
            <i class="glyphicon glyphicon-chevron-down"></i> 
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="{{asset('admin/users/updateprofile')}}"> <i class="glyphicon glyphicon-user"> </i> الملف الشخصي </a></li>
            <li class="divider"></li>
            <li>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
             <i class="glyphicon glyphicon-log-out"> </i> تسجيل خروج</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            </form>
            </li>
        </ul>
    </li>
</ul>
@endguest


    
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">

            
        @guest
        @else

        
  
            <ul class="nav" id="side-menu">


            @can('Sitesettings')
            <li>
                <a href="#"><i class="glyphicon glyphicon-globe"></i> إعدادات الموقع</a>
                <ul class="nav nav-second-level">
                    <li><a href="{{asset('admin/sitesettings')}}"><i class="glyphicon glyphicon-cog"></i> إستعراض البيانات</a></li>
                </ul>
            </li>
            @endcan

            
            @can('Categories')
            <li>
                <a href="#"><i class="glyphicon glyphicon-th"></i> إدارة التصنيفات</a>
                <ul class="nav nav-second-level">
                    <li><a href="{{asset('admin/categories/create')}}"><i class="glyphicon glyphicon-plus-sign"></i> أضف تصنيف جديد</a></li>
                    <li><a href="{{asset('admin/categories')}}"><i class="glyphicon glyphicon-cog"></i> استعرض التصنيفات</a></li>
                </ul>
            </li>
            @endcan
           
              
            @can('Services')
            <li>
                <a href="#"><i class="glyphicon glyphicon-list-alt"></i> إدارة الخدمات</a>
                <ul class="nav nav-second-level">
                    <li><a href="{{asset('admin/services/create')}}"><i class="glyphicon glyphicon-plus-sign"></i> أضف خدمة جديدة</a></li>
                    <li><a href="{{asset('admin/services')}}"><i class="glyphicon glyphicon-cog"></i> استعرض الخدمات</a></li>
                </ul>
            </li>
            @endcan
      
            
            @can('Pages')
            <li>
                <a href="#"><i class="glyphicon glyphicon-file"></i> إدارة الصفحات</a>
                <ul class="nav nav-second-level">
                    <li><a href="{{asset('admin/pages')}}"><i class="glyphicon glyphicon-cog"></i> استعرض الصفحات</a></li>
                </ul>
            </li>
            @endcan
         
            
            @can('Orders')
            <li>
                <a href="#"><i class="glyphicon glyphicon-shopping-cart"></i> الطلبات الواردة</a>
                <ul class="nav nav-second-level">
                    <li><a href="{{asset('admin/orders')}}"><i class="glyphicon glyphicon-cog"></i> إستعراض الطلبات</a></li>
                </ul>
            </li>
            @endcan
      
            
            @can('Users')
            <li>
                <a href="#"><i class="glyphicon glyphicon-user"></i> إدارة المستخدمين </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{asset('admin/users/create')}}"><i class="glyphicon glyphicon-plus-sign"></i> أضف مستخدم جديد</a></li>
                    <li><a href="{{asset('admin/users')}}"><i class="glyphicon glyphicon-cog"></i> إدارة المستخدمين</a></li>
                </ul>
            </li>
            @endcan
        



                    
            </ul>
            @endguest
            
    
    </div>
</div>
</nav>

        

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
            <h1 class="page-header">@yield('title')</h1>
		</div>
	</div>
            
    <div class="row">
        @include('back.layouts.error_msg')
        @yield('content')
    </div>
</div>
       

    <script src="{{ asset('admin/jquery-1.11.0.js') }}"></script>
    <script src="{{ asset('admin/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/sb-admin-2.js') }}"></script>


 
</body>

</html>
