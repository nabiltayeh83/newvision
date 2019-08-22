@extends('back.layouts.master')

@section('title', 'إضافة تصنيف جديد')

@section('content')

<div class="row">
<div class="panel panel-default">
<div class="panel-body">


{!! Form::open(['route' => 'admin.categories.store', 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal', 
'id' => 'artical_form']) !!}
{{csrf_field()}}

    <div class="form-group">
        {{ Form::label('title', 'التصنيف', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'التصنيف']) }}
       
            @error('title')
                <strong>{{ $message }}</strong><br>
            @enderror
       
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('description', 'الوصف', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => 'التصنيف', 'style' => 'height:70px;']) }}
        
        
            @error('description')
                <strong>{{ $message }}</strong><br>
            @enderror

        </div>
    </div>


    <div class="form-group">
        {{ Form::label('imagefile', 'الصورة', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            <input type="file" class="form-control" name="imagefile" accept="image/*" required />
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
            <a href="{{ asset('admin/categories/') }}" class="btn btn-default">إلغاء</a>
        </div>
    </div>

{!! Form::close() !!}

</div>
</div>
</div>

@endsection