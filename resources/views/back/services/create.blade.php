@extends('back.layouts.master')

@section('title', 'إضافة خدمة جديدة')

@section('content')

<div class="row">
<div class="panel panel-default">
<div class="panel-body">


{!! Form::open(['route' => 'admin.services.store', 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal', 
'id' => 'artical_form']) !!}
{{csrf_field()}}


    <div class="form-group">
        {{ Form::label('projectname', 'اسم المشروع', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::text('projectname', old('projectname'), ['class' => 'form-control', 'placeholder' => 'اسم المشروع']) }}
        
            @error('projectname')
                <strong>{{ $message }}</strong>
            @enderror
        
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('customername', 'اسم العميل', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::text('customername', old('customername'), ['class' => 'form-control', 'placeholder' => 'اسم العميل']) }}
        
            @error('customername')
                <strong>{{ $message }}</strong>
            @enderror

        </div>
    </div>


    <div class="form-group">
        {{ Form::label('category_id', 'التصنيف', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::select('category_id', $categories, 1, ['class' => 'form-control', 'style' => 'padding:5px;']) }}
        </div>
    </div>   


    <div class="form-group">
        {{ Form::label('stages', 'مراحل العمل', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::textarea('stages', old('stages'), ['class' => 'form-control', 'placeholder' => 'مراحل العمل', 'style' => 'height:70px;']) }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('period', 'مدة التنفيذ', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::text('period', old('period'), ['class' => 'form-control', 'placeholder' => 'مدة التنفيذ']) }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('year', 'السنة', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::text('year', old('year'), ['class' => 'form-control', 'placeholder' => 'السنة']) }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('vedio', 'الفيديو', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::textarea('vedio', old('vedio'), ['class' => 'form-control', 'placeholder' => 'الفيديو', 'style' => 'height:70px;']) }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('filetitle', 'عنوان الملف المرفق', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::text('filetitle', old('filetitle'), ['class' => 'form-control', 'placeholder' => 'عنوان الملف المرفق']) }}

            @error('filetitle')
                <strong>{{$message}}</strong>
            @enderror
       
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('fileattachupload', 'الملف المرفق', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            <input type="file" class="form-control" name="fileattachupload"  />
        </div>
    </div>  
 
    
    <div class="form-group">
        {{ Form::label('album', 'ألبوم الصور', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            <input type="file" class="form-control" name="album[]" accept="image/*" multiple />
        </div>
    </div>  

    <div class="form-group">
        {{ Form::label('imagefile', 'الصورة الرئيسية', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            <input type="file" class="form-control" name="imagefile" accept="image/*" required />
            الصورة الرئيسية يجب أن تكون بالأبعاد التالية, عرض 1024 بيكسل وإرتفاع 768 بيكسل
        </div>
    </div>  

        
    <div class="form-group">
        {{ Form::label('is_active', 'فعال', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::checkbox('is_active', 1, 1, ['id' => 'is_active']) }}
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            {{ Form::submit('حفظ', ['class' => 'btn btn-primary']) }}
            <a href="{{ asset('admin/services/') }}" class="btn btn-default">إلغاء</a>
        </div>
    </div>

{!! Form::close() !!}

</div>
</div>
</div>

@endsection