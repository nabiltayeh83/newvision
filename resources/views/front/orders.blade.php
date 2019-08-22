@extends('front.layouts.master')

@section('title', 'اطلب الخدمة')



@section('content')

    @php
        $links = "اطلب الخدمة";
    @endphp
    


            <div class="col-md-2"></div>
            
            <div class="col-md-8">

                @if($errors->count() >0)
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        @foreach($errors->all() as $error)
                            - {{$error}}<br>
                        @endforeach
                    </div>
                @endif
                
                @if(Session::get("msg")!=NULL)
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{substr(Session::get("msg"),2)}}<br><br>
                    </div>  
                @endif


                {!! Form::open(['route' => 'order', 'method' => 'POST', 'files' => 'true' , 'id' => 'artical_form']) !!}
                {{csrf_field()}}

                    <div class="control-group">
                        <div class="controls">
                            {{ Form::text('companyname', old('companyname'), ['class' => 'span8', 'placeholder' => '* إسم المؤسسة', 'title' => '* إسم المؤسسة']) }}
                            @error('companyname')
                                <span>{{$message}}<span>
                            @enderror
                        </div>
                    </div>


                    <div class="control-group">
                        <div class="controls">
                            {{ Form::text('fullname', old('fullname'), ['class' => 'span8', 'placeholder' => '* الإسم الكامل', 'title' => '* الإسم الكامل']) }}
                            @error('fullname')
                                <span>{{$message}}<span>
                            @enderror 
                        </div>
                    </div>


                    <div class="control-group">
                        <div class="controls">
                            {{ Form::text('email', old('email'), ['class' => 'span8', 'placeholder' => '* البريد الإلكتروني', 'title' => '* البريد الإلكتروني']) }}
                            @error('email')
                                <span>{{$message}}<span>
                            @enderror
                        </div>
                    </div>
                
        
                    <div class="control-group">
                        <div class="controls">
                            {{ Form::text('phone', old('phone'), ['class' => 'span8', 'placeholder' => '*  الهاتف', 'title' => '*  الهاتف']) }}
                            @error('phone')
                                <span>{{$message}}<span>
                            @enderror
                        </div>
                    </div>
            

                    <div class="control-group">
                        <div class="controls">
                            {{ Form::text('facebookaccount', old('facebookaccount'), ['class' => 'span8', 'placeholder' => 'رابط الفيسبوك', 'title' => 'رابط الفيسبوك']) }}
                        </div>
                    </div>
        

                    <div class="control-group">
                        <div class="controls">
                            {{ Form::text('twitteraccount', old('twitteraccount'), ['class' => 'span8', 'placeholder' => 'رابط تويتر', 'title' => 'رابط تويتر']) }}
                        </div>
                    </div>
                                        
        
                    <div class="control-group">
                        <div class="controls">
                        {{ Form::select('category_id', $categories, 1, ['class' => 'span8']) }}
                        </div>
                    </div>
                
        
                    <div class="control-group">
                        <div class="controls">
                            {{ Form::textarea('details', old('details'), ['class' => 'span8', 'placeholder' => 'تفاصيل الطلب', 'title' => 'تفاصيل الطلب']) }}
                            @error('details')
                                <span>{{$message}}<span>
                            @enderror
                        </div>
                    </div>
        
        
                    <div class="control-group">
                        <div class="controls">
                            <button id="send-mail" class="button">إرسال الطلب</button>
                        </div>
                    </div>
                                    
                {!! Form::close() !!}

            </div>

            <div class="col-md-2"></div>



           
@endsection