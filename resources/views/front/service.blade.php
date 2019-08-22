@extends('front.layouts.master')

@section('title', "$category->title")

@section('content')

                @php
                    $links = "<a href='\category'>" . "خدماتنا" . "</a> / " . $category->title;
                    $results = $category->services()->paginate(8);
                @endphp
          
                
                @if(count($results) > 0)
                <div class="wrapper">
                        <ul class="auto-grid">
                            @foreach($results as $itm)
                                @include('front.layouts.showservices')
                            @endforeach
                        </ul>
                </div>
                                        
                {{$results->links()}}
                
                @endif   
                
               
                @if(count($results) == 0)
                    <h2 id="errorimg-h2">نأسف!! لا يوجد أي نتائج</h2>
                @endif         
                  

@endsection 