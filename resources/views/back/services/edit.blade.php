@extends('back.layouts.master')

@section('title', 'تعديل خدمة')

@section('content')
@if(isset($results))
<div class="row">
<div class="panel panel-default">
<div class="panel-body">


{!! Form::open(['route' => ['admin.services.update', $results->id], 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal', 
'id' => 'artical_form']) !!}
{{csrf_field()}}
{{method_field('PUT')}}



         
    <div class="form-group">
        {{ Form::label('projectname', 'اسم المشروع', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::text('projectname', $results->projectname, ['class' => 'form-control', 'placeholder' => 'اسم المشروع']) }}
        
            @error('projectname')
                <strong>{{ $message }}</strong>
            @enderror
        
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('customername', 'اسم العميل', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::text('customername', $results->customername, ['class' => 'form-control', 'placeholder' => 'اسم العميل']) }}
        
            @error('customername')
                <strong>{{ $message }}</strong>
            @enderror

        </div>
    </div>


    <div class="form-group">
        {{ Form::label('category_id', 'التصنيف', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::select('category_id', $categories, $results->category_id, ['class' => 'form-control', 'style' => 'padding:5px;']) }}
        </div>
    </div>   


    <div class="form-group">
        {{ Form::label('stages', 'مراحل العمل', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::textarea('stages', $results->stages, ['class' => 'form-control', 'placeholder' => 'مراحل العمل', 'style' => 'height:70px;']) }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('period', 'مدة التنفيذ', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::text('period', $results->period, ['class' => 'form-control', 'placeholder' => 'مدة التنفيذ']) }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('year', 'السنة', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::text('year', $results->year, ['class' => 'form-control', 'placeholder' => 'السنة']) }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('vedio', 'الفيديو', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::textarea('vedio', $results->vedio, ['class' => 'form-control', 'placeholder' => 'الفيديو', 'style' => 'height:70px;']) }}
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
        {{ Form::label('album', 'ألبوم الصور', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            <input type="file" class="form-control" name="album[]" accept="image/*" multiple />
        </div>
    </div>  

    @if($results->images->count() > 0)
    <div class="form-group">
        {{ Form::label('album', 'حذف صور', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
        <table class="table table-striped table-responsive">
        @php $i=0;  @endphp
        <tr>
        @foreach($results->images as $img) 
        @php $i++;  @endphp

        <td><input type="checkbox" name="oldimages[]" id="{{$img->id}}" value="{{$img->id}}"></td>
        <td><label for="{{$img->id}}">
        <img src='{{asset('storage/images/'.$img->image)}}' style="width:110px;" class="img-thumbnail">
        </label>
        </td>

        @if($i%5 ==0) </tr><tr> @endif
            
        @endforeach
        </table>
        </div>
    </div>  
    @endif

    <div class="form-group">
        {{ Form::label('imagefile', 'الصورة الرئيسية', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            <input type="file" class="form-control" name="imagefile" accept="image/*"  />
            الصورة الرئيسية يجب أن تكون بالأبعاد التالية, عرض 1024 بيكسل وإرتفاع 768 بيكسل
            <br><img src="{{asset('storage/images/' . $results->image)}}" style="width:150px;" class="margin-t10">
        </div>
    </div>  

        
    <div class="form-group">
        {{ Form::label('is_active', 'فعال', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ Form::checkbox('is_active', 1, $results->is_active, ['id' => 'is_active']) }}
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
@endif
@endsection