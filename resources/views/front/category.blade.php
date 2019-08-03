@extends('front.layouts.master')

@section('title', 'خدماتنا')

@section('content')


<div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1>خدماتنا</h1>
                    </div>
                    <div>
       
                    
                    @if(count($results) > 0)
                @foreach($results as $r)
                    <div class="col-md-3">
                    <div class="centered service">
                            <div class="circle-border zoom-in">
                                <a href="{{route('services', $r->id)}}" title="{{$r->title}}">
                                <img class="img-circle" src="{{ asset('images/'.$r->image) }}" alt="{{$r->title}}">
                            </div>
                            <h3>{{$r->title}} (<span style="color:white; font-size:21pt;">{{servicesCount($r->id)}}</span>)</h3>
                            <p>{{$r->details}}</p>
                        </div>
                    </div>
                @endforeach
                @endif    

               </div>
                </div>
               
           
        </div>
</div>



@endsection 