@extends('front.layouts.master')

@section('title', "خدماتنا / $category")

@section('content')

    @if(count($results) > 0)
    <div class="wrapper">
    <ul class="auto-grid">
    
        @foreach($results as $itm)
            @include('front.layouts.showservices')
        @endforeach

    </ul>
    </div>
    @endif                


@endsection 