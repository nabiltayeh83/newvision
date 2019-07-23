<div class="section primary-section" id="service">
            <div class="container">
                <!-- Start title section -->
                <div class="title">
                    <h1>خدماتنا</h1>
                </div>
                <div class="row">
                @if(count($categories) > 0)
                @foreach($categories as $c)
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <img class="img-circle" src="{{ asset('images/'.$c->image) }}" alt="{{$c->title}}">
                            </div>
                            <h3>{{$c->title}}</h3>
                            <p>{{$c->details}}</p>
                        </div>
                    </div>
                @endforeach
                @endif    

                    

                   
                    

                </div>
            </div>
        </div>