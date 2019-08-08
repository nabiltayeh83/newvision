@extends('front.layouts.master')

@section('title', "خدماتنا / " . categoryName($results->category_id) . " / $results->projectname")

@section('content')


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
                               

@endsection 