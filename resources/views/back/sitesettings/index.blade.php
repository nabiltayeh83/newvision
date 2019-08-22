@extends('back.layouts.master')

@section('title', 'إعدادات الموقع')


@section('content')




<div class="row">
<div class="col-lg-12">

    <div class="panel panel-default">


    
<div class="panel-body">

<div class="table-responsive">
@if(count($results) > 0)
<table class="table table-striped table-boredered table-hover table-responsive">
    <thead>
    <tr>
        <th style="width:15%;">العنوان - إسم الموقع</th>
        <th style="width:20%;">وصف الموقع</th>
        <th style="width:20%;">الكلمات المفتاحية</th>
        <th>أيقون الموقع</th>
        <th style="width:20%;">شعار الموقع</th>
        <th></th>
    </tr>
    </thead>

    @foreach($results as $r)
    <tr>
        <td>{{$r->title}}</td>
        <td>{{$r->description}}</td>
        <td>{{$r->keywords}}</td>
        <td><img src="{{asset('storage/images/' . $r->siteico)}}"></td>
        <td><img src="{{asset('storage/images/' . $r->logo)}}" style="width:160px;"></td>
        <td><a href="{{asset('admin/sitesettings/' . $r->id . '/edit')}}" class="btn btn-primary" title="تعديل">
        <span class="glyphicon glyphicon-edit"></span></a></td>

    </tr>
    @endforeach

</table>
@else
<div>
عذراً... لا يوجد أي بيانات<br><br>
<a href="{{asset('admin/sitesettings/create')}}" class="btn btn-warning">
إضافة إعدادات الموقع
</a>
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
            $.get("/admin/pages/active/"+id);
        });
    });
</script>


@endsection