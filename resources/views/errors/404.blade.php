@extends('front.layouts.master')

@section('title', 'صفحة غير متوفرة')

@section('content')

<p class="errorimg">
    <a href="{{route('HomePage')}}">
    <img src="{{asset('storage/images/404.png')}}">
    </a>               
</p>
                          
@endsection