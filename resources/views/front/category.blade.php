@extends('front.layouts.master')

@section('title', 'خدماتنا')


@section('content')

        @php $links = "خدماتنا"; @endphp
                            
        @if(count($results) > 0)
                <div class="wrapper-three">
                        <ul class="auto-grid-three">
                                @foreach($results as $r)
                                        <li>
                                            <a href="{{route('services', $r->id)}}" title="{{$r->title}}">
                                                    <div class="circle-border zoom-in">
                                                            <img class="img-circle" src="{{ asset('storage/images/'.$r->image) }}" alt="{{$r->title}}">
                                                    </div>
                                                    <h3>{{$r->title}} ({{servicesCount($r->id)}})</h3>
                                                    <p id="cat_des">{{$r->description}}</p>
                                            </a>
                                        </li>
                                @endforeach
                        </ul>
                </div>
        @else
                <h2 id="errorimg-h2">نأسف!! لا يوجد أي نتائج</h2>
        @endif             

@endsection 