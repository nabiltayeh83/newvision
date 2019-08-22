@extends('front.layouts.master')

@section('title', $results->title)


@section('content')
                @php
                    $links = $results->title;
                @endphp

            @if($results->image)
                <img src="{{ asset('storage/images/'.$results->image) }}" class="page-img">
            @endif

            <p>{!! $results->details !!}</p>

            @if($results->fileattach)
                    <h3>الملف المرفق</h3>
                    <a href="{{ asset('storage/upload/'. $results->fileattach)}}" target="_blank" class="button">
                            {{$results->filetitle}}
                    </a>
            @endif
@endsection