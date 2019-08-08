@extends('front.layouts.master')

@section('title', 'الرئيسية')


@section('content')


  
@if(count($servicesSlider) > 0)
@include('front.slider')
@endif
            



             
            @if(count($lastServices) > 0)
            <div class="wrapper">
            <ul class="auto-grid">
            @foreach($lastServices as $itm)
                @include('front.layouts.showservices')
            @endforeach
            </ul>
            </div>
            @endif

  



@endsection
