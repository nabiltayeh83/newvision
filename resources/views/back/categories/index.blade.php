@extends('back.layouts.master')

@section('title', 'إدارة التصنيفات')


@section('content')

<div class="row">
<div class="col-lg-12">

    <div class="panel panel-default">

        <div class="panel-heading">
            <form method="get" action="{{asset('admin/categories')}}" class="row">
                <div class="col-sm-12 text-right">
                <a class="btn btn-success" href="{{asset('admin/categories/create')}}">
                <i class="glyphicon glyphicon-plus"></i> إضافة تصنيف جديد</a>
                </div>
            </form>
        </div>
    
<div class="panel-body">

<div class="table-responsive">
@if(count($results) > 0)
<table class="table table-striped table-boredered table-hover table-responsive">
    <thead>
    <tr>
        <th>#</th>
        <th style="width:20%;">التصنيف</th>
        <th style="width:50%;">الوصف</th>
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
        <td>{{$r->title}}</td>
        <td>{{$r->description}}</td>
        <td><input type="checkbox" value="{{$r->id}}" class="cbActive" {{$r->is_active?"checked":""}}></td>
        <td><img src="{{asset('storage/images/' . $r->image)}}" style="height:90px;"></td>
        <td><a href="{{asset('admin/categories/' . $r->id . '/edit')}}" class="btn btn-primary" title="تعديل">
        <span class="glyphicon glyphicon-edit"></span></a></td>
        <td><a href="{{asset('admin/categories/delete/' . $r->id)}}" class="btn Confirm btn-danger" title="حذف">
        <span class="glyphicon glyphicon-trash"></span></a></td>
    </tr>
    @endforeach

</table>
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
            $.get("/admin/categories/active/"+id);
        });
    });
</script>


@endsection