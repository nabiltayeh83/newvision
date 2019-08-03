@extends('front.layouts.master')

@section('title', $results->title)


@section('content')
<div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1>{{$results->title}}</h1>
                    </div>
                    <div>
               <p>{!! $results->details !!}</p>    
               </div>
                </div>
               
           
        </div>
</div>
@endsection