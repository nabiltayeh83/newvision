@extends('back.layouts.master')

@section('title', 'تعديل صفحة')

@section('content')
@if(isset($results))
<div class="row">
<div class="panel panel-default">
<div class="panel-body">


{!! Form::open(['route' => ['admin.pages.update', $results->id], 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal', 
'id' => 'artical_form']) !!}
{{csrf_field()}}
{{method_field('PUT')}}

    <div class="form-group">
        {{ Form::label('title', 'العنوان', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::text('title', $results->title, ['class' => 'form-control' , 'placeholder' => 'العنوان']) }}
       
            @error('title') 
            <strong>{{$message}}</strong>
            @enderror
       
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('details', 'التفاصيل', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::textarea('details', $results->details, ['class' => 'form-control ckeditor', 'placeholder' => 'التفاصيل']) }}
      
            @error('details') 
            <strong>{{$message}}</strong>
            @enderror
      
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('filetitle', 'عنوان الملف المرفق', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::text('filetitle', $results->filetitle, ['class' => 'form-control', 'placeholder' => 'عنوان الملف المرفق']) }}

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


    @if($results->fileattach)
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            {{ Form::checkbox('deletefileattach', 1, 0, ['id' => 'deletefileattach']) }}  حذف الملف
            <a href="{{ asset('storage/upload/'. $results->fileattach)}}" target="_blank" class="btn btn-warning">
                    {{$results->filetitle}}
                    </a>
        </div>
    </div>
    @endif


    <div class="form-group">
        {{ Form::label('photo', 'الصورة', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            <input type="file" class="form-control" name="photo" accept="image/*"  />
            الصورة يجب أن تكون بالأبعاد التالية, عرض 1024 بيكسل وإرتفاع 768 بيكسل
        </div>
    </div>  

        
  

    @if($results->image)
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <img src='{{asset('storage/images/'.$results->image)}}' style="width:300px;" class="img-thumbnail">
        </div>
    </div>
    @endif


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            {{ Form::submit('حفظ', ['class' => 'btn btn-primary']) }}
            <a href="{{ asset('admin/pages/') }}" class="btn btn-default">إلغاء</a>
        </div>
    </div>

{!! Form::close() !!}

</div>
</div>
</div>
@endif
@endsection