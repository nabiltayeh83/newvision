@extends('front.layouts.master')

@section('title', 'الرئيسية')


@section('content')

      <!-- Start cSlider -->
      <div id="da-slider" class="da-slider"  style="direction:rtl;">
                <div class="triangle"></div>
                <!-- mask elemet use for masking background image -->
                <div class="mask"></div>
                <!-- All slides centred in container element -->
                <div class="container">
                    <!-- Start first slide -->
                    <div class="da-slide" >
                        <h2 class="fittext2">أهلا وسهلا بكم</h2>
                        <h4>تصميم ومونتاج</h4>
                        <p>أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم</p>
                        <a href="#" class="da-link button">Read more</a>
                        <div class="da-img">
                            <img src="{{ asset('images/Slider01.png') }}" alt="image01" width="320">
                        </div>
                    </div>
                    <!-- End first slide -->
                    <!-- Start second slide -->
                    <div class="da-slide">
                        <h2>أهلا وسهلا بكم</h2>
                        <h4>إدارة محتوى</h4>
                        <p>أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم</p>
                        <a href="#" class="da-link button">Read more</a>
                        <div class="da-img">
                            <img src="{{ asset('images/Slider02.png') }}" width="320" alt="image02">
                        </div>
                    </div>
                    <!-- End second slide -->
                    <!-- Start third slide -->
                    <div class="da-slide">
                        <h2>أهلا وسهلا بكم</h2>
                        <h4>تصوير</h4>
                        <p>أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم أهلا وسهلا بكم</p>
                        <a href="#" class="da-link button">Read more</a>
                        <div class="da-img">
                            <img src="{{ asset('images/Slider03.png') }}" width="320" alt="image03">
                        </div>
                    </div>
                    <!-- Start third slide -->
                    <!-- Start cSlide navigation arrows -->
                    <div class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                    </div>
                    <!-- End cSlide navigation arrows -->
                </div>
            </div>


            </div>
            
            



            <div class="section primary-section" id="about">
            <div class="triangle"></div>
            <div class="container">
                <div class="title">
                    <h1>{{$aboutus->title}}</h1>
                </div>
              
               <div>
               <p>{!! $aboutus->details !!}</p>    
               </div>
              
            </div>
        </div>
        <!-- About us section end -->
        <div class="section secondary-section">
            <div class="triangle"></div>
            <div class="container centered">
                @if($aboutus->fileattach)
                <a href="storage/upload/{{$aboutus->fileattach}}" target="_blank" class="button">
                {{$aboutus->filetitle}}</a>
                @endif
            </div>
        </div>
        <!-- Client section start -->
        <!-- Client section start -->







        <div class="section primary-section" id="service" >
            <div class="container">
                <!-- Start title section -->
                <div class="title">
                    <h1>خدماتنا</h1>
                </div>
                <div class="row-fluid"> 
                @if(count($categories) > 0)
                @foreach($categories as $c)
                    <div class="col-md-3">
                    <div class="centered service">
                            <div class="circle-border zoom-in">
                                <a href="" title="{{$c->title}}">
                                <img class="img-circle" src="{{ asset('images/'.$c->image) }}" alt="{{$c->title}}">
                            </div>
                            <h3>{{$c->title}} (<span style="color:white; font-size:21pt;">{{servicesCount($c->id)}}</span>)</h3>
                            <p>{{$c->details}}</p>
                        </div>
                    </div>
                @endforeach
                @endif    

                    

                   
                    

                </div>
            </div>
        </div>






        <div id="orders" class="section secondary-section">
            <div class="container">
                <div class="title">
                    <h1>Orders</h1>
                    <p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p>
                </div>
                <div class="price-table row-fluid">
                    <div class="span4 price-column">
                        <h3>Basic</h3>
                        <ul class="list">
                            <li class="price">$19,99</li>
                            <li><strong>Free</strong> Setup</li>
                            <li><strong>24/7</strong> Support</li>
                            <li><strong>5 GB</strong> File Storage</li>
                        </ul>
                        <a href="#" class="button button-ps">BUY</a>
                    </div>
                    <div class="span4 price-column">
                        <h3>Pro</h3>
                        <ul class="list">
                            <li class="price">$39,99</li>
                            <li><strong>Free</strong> Setup</li>
                            <li><strong>24/7</strong> Support</li>
                            <li><strong>25 GB</strong> File Storage</li>
                        </ul>
                        <a href="#" class="button button-ps">BUY</a>
                    </div>
                    <div class="span4 price-column">
                        <h3>Premium</h3>
                        <ul class="list">
                            <li class="price">$79,99</li>
                            <li><strong>Free</strong> Setup</li>
                            <li><strong>24/7</strong> Support</li>
                            <li><strong>50 GB</strong> File Storage</li>
                        </ul>
                        <a href="#" class="button button-ps">BUY</a>
                    </div>
                </div>
                <div class="centered">
                    <p class="price-text">We Offer Custom Plans. Contact Us For More Info.</p>
                    <a href="#contact" class="button">Contact Us</a>
                </div>
            </div>
        </div>




        <div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1>{{$contactus->title}}</h1>
                    </div>
                    <div>
               <p>{!! $contactus->details !!}</p>    
               </div>
                </div>
               
           
        </div>
</div>


@endsection
