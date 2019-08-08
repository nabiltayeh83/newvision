<div class="navbar">    
    <div class="navbar-inner">
        <div class="container">

            <a href="{{route('HomePage')}}" class="brand">
                <img src="{{ asset('storage/images/'.$sitesettings->logo) }}" alt="{{$sitesettings->title}}" />
            </a>
            
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <i class="icon-menu"></i>
            </button>
                    
            <div class="nav-collapse collapse pull-right">
                <ul class="nav" style="direction:rtl;">
                    <li class="active"><a href="{{route('HomePage')}}">الرئيسية</a></li>
                    <li><a href="{{route('aboutUs')}}">عن الشركة</a></li>
                    <li><a href="{{route('category')}}">خدماتنا</a></li>
                    <li><a href="{{route('order')}}">اطلب الخدمة</a></li>
                    <li><a href="{{route('contactUs')}}">إتصل بنا</a></li>
                </ul>
            </div>
            
        </div>
    </div>
</div>