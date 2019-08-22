@extends('back.layouts.master')

@section('title', 'إدارة الخدمات')


@section('content')

<div class="row">
<div class="col-lg-12">

    <div class="panel panel-default">

        <div class="panel-heading">
            <form method="get" action="{{asset('admin/services')}}" class="row">
                <div class="col-sm-3">
                <input name="key" id="key" type="text" required="required" class="form-control" placeholder="إبحث..">
                </div>
                <div class="col-sm-1">
                <button class="btn btn-primary" type="submit">إبحث</button>
                </div>
                <div class="col-sm-8 text-left">
                <a class="btn btn-success" href="{{asset('admin/services/create')}}">
                <i class="glyphicon glyphicon-plus"></i> إضافة خدمة جديدة</a>
                </div>
            </form>
        </div>
    
<div class="panel-body">
@if(isset($key))
<h3>البحث عن / {{$key}}</h3><br>
@endif

<div class="table-responsive">
@if(count($results) > 0)
<table class="table table-striped table-boredered table-hover table-responsive">
    <thead>
    <tr>
        <th>#</th>
        <th>إسم المشروع</th>
        <th>العميل</th>
        <th>التصنيف</th>
        <th>التاريخ</th>
        <th>فعال</th>
        <th>الصورة</th>
        <th></th>
        <th></th>
    </tr>
    </thead>

    @php $i=1; @endphp
    @foreach($results as $r)
    <tr>
        <td>{{$i++}}</th>
        <td>{{$r->projectname}}</td>
        <td>{{$r->customername}}</td>
        <td>{{$r->category->title}}</td>
        <td>{{substr($r->created_at, 0, 10)}}</td>
        <td><input type="checkbox" value="{{$r->id}}" class="cbActive" {{$r->is_active?"checked":""}}></td>
        <td><img src="{{asset('storage/images/thumb/'.$r->image)}}" class="img-thumbnail" style="width:130px;"></td>
        <td><a href="{{asset('admin/services/' . $r->id . '/edit')}}" class="btn btn-primary" title="تعديل">
        <span class="glyphicon glyphicon-edit"></span></a></td>
        <td><a href="{{asset('admin/services/delete/' . $r->id)}}" class="btn Confirm btn-danger" title="حذف">
        <span class="glyphicon glyphicon-trash"></span></a></td>
    </tr>
    @endforeach

</table>
{{$results->links()}}
@else
<div>
عذراً... لا يوجد أي نتائج
</div>
@endif

</div>
</div>
</div>
</div>
</div>

<script>
    $(function(){
        $(".cbActive").click(function(){
            var id=$(this).val();
            $.get("/admin/services/active/"+id);
        });
    });
</script>


@endsection