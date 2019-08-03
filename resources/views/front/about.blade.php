
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
               @if($results->fileattach)
                <a href="storage/upload/{{$results->fileattach}}" target="_blank" class="button">
                {{$results->filetitle}}</a>
                @endif
                
               </div>
                </div>
               
           
        </div>
</div>


@endsection