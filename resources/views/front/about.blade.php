@extends('front.layouts.master')

@section('title', $results->title)

@section('content')

               
        <p>{!! $results->details !!}</p>    
               
        @if($results->fileattach)
            <a href="storage/upload/{{$results->fileattach}}" target="_blank" class="button">
            {{$results->filetitle}}
            </a>
        @endif
                
                          
@endsection