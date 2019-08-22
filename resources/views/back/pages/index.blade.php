@extends('back.layouts.master')

@section('title', 'إدارة الصفحات')


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
        <th>#</th>
        <th style="width:30%;">العنوان</th>
        <th>تاريخ آخر تحديث</th>
        <th>الصورة</th>
        <th></th>
    </tr>
    </thead>

    @php $i=1; @endphp
    @foreach($results as $r)
    <tr>
        <td>{{$i++}}</th>
        <td>{{$r->title}}

        </td>
        <td>{{substr($r->updated_at, 0, 10)}}</td>
        <td><img src="{{asset('storage/images/'.$r->image)}}" class="img-thumbnail" style="width:80px;"></td>
        <td><a href="{{asset('admin/pages/' . $r->id . '/edit')}}" class="btn btn-primary" title="تعديل">
        <span class="glyphicon glyphicon-edit"></span></a></td>

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




@endsection