@extends('front.layouts.master')

@section('title', $results->projectname)

@section('content')


<div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                    <a href="{{route('category')}}">خدماتنا</a> / 
                    <a href="{{route('services', $results->category_id)}}">{{categoryName($results->category_id)}}</a>
                    <h1>{{$results->projectname}}</h1>
                    </div>
                    <div>
       

                    
                @if($results)
                    <div class="col-md-12">
                    <div class="centered service">


                            <div class="">
                            @if($results->vedio)
                            {!!$results->vedio!!}
                            @else
                            <img src="{{asset('storage/images/'.$results->image)}}">
                            @endif
                            </div>


                            <div>اسم المشروع: {{$results->projectname}}</div>
                            <div>اسم العميل: {{$results->customername}}</div>
                            <div>التصنيف: {{categoryName($results->category_id)}}</div>

                            @if($results->stages)
                                <div>مراحل العمل: {{$results->stages}}</div>
                            @endif

                            @if($results->period)
                                <div>مدة التنفيذ: {{$results->period}}</div>
                            @endif    

                            @if($results->year)    
                                <div>السنة: {{$results->year}}</div>
                            @endif

                            @if(count($results->images) > 0)
                                @foreach($results->images as $img)
                                    <img src="{{ asset('storage/images/'.$img->image)}}">
                                @endforeach
                            @endif


                        </div>
                    </div>
                @endif    



               </div>
               
                </div>
                
               
           
        </div>
</div>



@endsection 