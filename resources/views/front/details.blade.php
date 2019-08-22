@extends('front.layouts.master')

@section('title', "$results->projectname")

@section('content')


    @php
        $links = "<a href='\category'>" . "خدماتنا" . "</a> / <a href='\services/$results->category_id'>" . categoryName($results->category_id) . "</a>";
    @endphp

    @if($results)
        <div class="col-md-12">
            <div class="centered service">

                <div class="margin-b15">
                    @if($results->vedio)
                        {!!$results->vedio!!}
                    @else
                        <img src="{{asset('storage/images/'.$results->image)}}">
                    @endif
                </div>

                <div>اسم المشروع: <span class="prodet">{{$results->projectname}}</span></div>
                <div>اسم العميل: <span class="prodet">{{$results->customername}}</span></div>
                <div>التصنيف: <span class="prodet">{{categoryName($results->category_id)}}</span></div>

                @if($results->stages)
                    <div>مراحل العمل: <span class="prodet">{{$results->stages}}</span></div>
                @endif

                @if($results->period)
                    <div>مدة التنفيذ: <span class="prodet">{{$results->period}}</span></div>
                @endif    

                @if($results->year)    
                    <div>السنة: <span class="prodet">{{$results->year}}</span></div>
                @endif

                @if(count($results->images) > 0)
                <div>
                    @foreach($results->images as $img)
                        <img src="{{ asset('storage/images/'.$img->image)}}" class="margin-t15">
                    @endforeach
                </div>    
                @endif
                

                @if($results->fileattach)
                <div class="margin-t15">
                    <br><h3>الملف المرفق</h3>
                    <a href="{{ asset('storage/upload/'. $results->fileattach)}}" target="_blank" class="button">
                        {{$results->filetitle}}
                    </a>
                </div>    
                @endif


            </div>
        </div>
    @endif    
                               

@endsection 