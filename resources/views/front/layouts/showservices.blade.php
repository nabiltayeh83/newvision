

<li>
        <div class="imgcontainer">
                <a href="{{route('details', $itm->id)}}" class='overlayproname' title="{{$itm->projectname}}">
                        <img src="{{ asset('storage/images/thumb/'.$itm->image) }}" alt="{{$itm->projectname}}" class="imageeffect">
                        <div class="overlay">
                                {{\Illuminate\Support\Str::words($itm->projectname,12)}}
                                <h3 class="margin-t10per"><a href="{{route('category')}}">خدماتنا</a> / 
                                <a href="{{route('services', $itm->category_id)}}">{{categoryName($itm->category_id)}}</a>
                                </h3>
                        </div>
                </a>
        </div>
</li>