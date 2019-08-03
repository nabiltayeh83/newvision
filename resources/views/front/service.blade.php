@extends('front.layouts.master')

@section('title', $category)

@section('content')


<div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1><a href="{{route('category')}}">خدماتنا</a> / {{$category}}</h1>
                    </div>
                    <div>
       

                    
                @if(count($results) > 0)
                @foreach($results as $r)
                    <div class="col-md-5">
                    <div class="centered service">
                            <div class="">
                                <a href="{{route('details', $r->id)}}" title="{{$r->projectname}}">
                                <img  src="{{ asset('storage/images/'.$r->image) }}" alt="{{$r->projectname}}">
                            </div>
                            <h3>{{$r->projectname}}</h3>
                        </div>
                    </div>
                @endforeach
                @endif    



               </div>
               
                </div>
                
               
           
        </div>
</div>



@endsection 