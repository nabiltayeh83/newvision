@extends('back.layouts.master')

@section('title', 'إعدادات الموقع')

@section('content')
<div class="row">
<div class="panel panel-default">
<div class="panel-body">


{!! Form::open(['route' => ['admin.sitesettings.store'], 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal', 
'id' => 'artical_form']) !!}
{{csrf_field()}}

    <div class="form-group">
        {{ Form::label('title', 'العنوان - إسم الموقع', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::text('title', old('title'), ['class' => 'form-control' , 'placeholder' => 'العنوان - إسم الموقع']) }}
       
            @error('title')
                <strong>{{ $message }}</strong>
            @enderror
       
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('description', 'وصف الموقع', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => 'وصف الموقع', 'style' => 'height:90px;']) }}
       
            @error('description')
                <strong>{{ $message }}</strong>
            @enderror
       
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('text', 'الكلمات المفتاحية', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::textarea('keywords', old('keywords'), ['class' => 'form-control', 'placeholder' => 'الكلمات المفتاحية', 'style' => 'height:90px;']) }}
            
            @error('keywords')
                <strong>{{ $message }}</strong><br>
            @enderror
            
            <span style="color:red">
            يجب الفصل بين كل كلمة مفتاحية و الأخرى بفاصلة, مثلا:
            تصميم, مونتاج, تصوير</span><br><br>
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('siteicofile', 'أيقون الموقع', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            <input type="file" class="form-control" name="siteicofile" accept="image/*" required />

            <span style="color:red">
              الأيقون يجب أن يكون بالأبعاد التالية, إرتفاع 16 بيكسل, عرض 16 بيكسل.</span><br>
         
        </div>
    </div>  


    <div class="form-group">
        {{ Form::label('logofile', 'شعار الموقع', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            <input type="file" class="form-control" name="logofile" accept="image/*" required />
            <span style="color:red"> شعار الموقع يجب أن يكون بالأبعاد التالية, إرتفاع 80 بيكسل, عرض 240 بيكسل</span><br>
       
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
@endsection