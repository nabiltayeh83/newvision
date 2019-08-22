@extends('back.layouts.master')

@section('title', 'إعدادات الموقع')

@section('content')
@if(isset($results))
<div class="row">
<div class="panel panel-default">
<div class="panel-body">


{!! Form::open(['route' => ['admin.sitesettings.update', $results->id], 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal', 
'id' => 'artical_form']) !!}
{{csrf_field()}}
{{method_field('PUT')}}

    <div class="form-group">
        {{ Form::label('title', 'العنوان - إسم الموقع', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::text('title', $results->title, ['class' => 'form-control' , 'placeholder' => 'العنوان - إسم الموقع']) }}
            
            @error('title')
                <strong>{{ $message }}</strong>
            @enderror
       
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('description', 'وصف الموقع', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::textarea('description', $results->description, ['class' => 'form-control', 'placeholder' => 'وصف الموقع', 'style' => 'height:90px;']) }}
        
            @error('description')
                <strong>{{$message}}</strong>
            @enderror

        </div>
    </div>


    <div class="form-group">
        {{ Form::label('text', 'الكلمات المفتاحية', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::textarea('keywords', $results->keywords, ['class' => 'form-control', 'placeholder' => 'الكلمات المفتاحية', 'style' => 'height:90px;']) }}
            
            @error('keywords')
                <strong>{{$message}}</strong><br>
            @enderror
            
            <span style="color:red">
            يجب الفصل بين كل كلمة مفتاحية و الأخرى بفاصلة, مثلا:
            تصميم, مونتاج, تصوير</span><br><br>
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('siteicofile', 'أيقون الموقع', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            <input type="file" class="form-control" name="siteicofile" accept="image/*"  />
            <span style="color:red">
              الأيقون يجب أن يكون بالأبعاد التالية, إرتفاع 16 بيكسل, عرض 16 بيكسل.</span><br>
            @if($results->siteico)  
            <img src="{{asset('storage/images/'.$results->siteico)}}"><br><br>
            @endif
        </div>
    </div>  


    <div class="form-group">
        {{ Form::label('logofile', 'شعار الموقع', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            <input type="file" class="form-control" name="logofile" accept="image/*" />
            
            <span style="color:red"> شعار الموقع يجب أن يكون بالأبعاد التالية, إرتفاع 80 بيكسل, عرض 240 بيكسل</span><br>
            @if($results->logo)
            <img src="{{asset('storage/images/'.$results->logo)}}" style="width:240px; height:80px;">
            @endif
        </div>
    </div>  


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            {{ Form::submit('حفظ', ['class' => 'btn btn-primary']) }}
            <a href="{{ asset('admin/sitesettings/') }}" class="btn btn-default">إلغاء</a>
        </div>
    </div>

{!! Form::close() !!}

</div>
</div>
</div>
@endif
@endsection