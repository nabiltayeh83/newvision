
<div id="da-slider" class="da-slider">
    
        <div class="container">       
                @foreach($servicesSlider as $itm)
                        <div class="da-slide">
                                <a href="{{route('details', $itm->id)}}" title="{{$itm->projectname}}">
                                        <h2>{{categoryName($itm->category_id)}}</h2>
                                        <h4>{{\Illuminate\Support\Str::words($itm->projectname,11)}}</h4>
                                        <div class="da-img">
                                                <img src="{{ asset('storage/images/thumb/'.$itm->image) }}" alt="{{$itm->projectname}}">
                                        </div>
                                </a>
                        </div>
                @endforeach      
                        <div class="da-arrows">
                                    <span class="da-arrows-prev"></span>
                                    <span class="da-arrows-next"></span>
                        </div>        
        </div>


</div>