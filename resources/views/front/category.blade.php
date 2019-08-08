@extends('front.layouts.master')

@section('title', 'خدماتنا')

@section('content')

                    
        @if(count($results) > 0)
        <div class="wrapper-three">
        <ul class="auto-grid-three">
        @foreach($results as $r)
  
        <li>
        <a href="{{route('services', $r->id)}}" title="{{$r->title}}">
                <div class="circle-border zoom-in">
                    <img class="img-circle" src="{{ asset('storage/images/'.$r->image) }}" alt="{{$r->title}}">
                </div>
                
                <h3>{{$r->title}} (<span style="color:white; font-size:21pt;">{{servicesCount($r->id)}}</span>)</h3>
                <p>{{$r->details}}</p>
            </a>
        </li>

        @endforeach
        </ul>
        </div>
        @endif             

@endsection 