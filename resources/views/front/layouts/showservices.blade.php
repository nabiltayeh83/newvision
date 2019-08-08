<li>
    <div class="imgcontainer">
        <img src="{{ asset('storage/images/thumb/'.$itm->image) }}" alt="{{$itm->projectname}}" class="imageeffect">
        <div class="overlay">
            <a href="{{route('details', $itm->id)}}" class='overlayproname' title="{{$itm->projectname}}">
            {{\Illuminate\Support\Str::words($itm->projectname,13)}}
            </a>
            <h4><a href="{{route('category')}}">خدماتنا</a> / 
            <a href="{{route('services', $itm->category_id)}}">{{categoryName($itm->category_id)}}</a>
            </h4>
        </div>
    </div>
</li>