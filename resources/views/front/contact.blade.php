@extends('front.layouts.master')

@section('title', $results->title)

@section('content')

        <p>{!! $results->details !!}</p>    
                   
@endsection