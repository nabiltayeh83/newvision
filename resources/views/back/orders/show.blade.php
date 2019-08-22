@extends('back.layouts.master')

@section('title', 'عرض تفاصيل الطلب')

@section('content')

<div class="row">
<div class="panel panel-default">
<div class="panel-body">


{!! Form::open(['route' => ['admin.services.update', $results->id], 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal', 
'id' => 'artical_form']) !!}
{{csrf_field()}}
{{method_field('PUT')}}

    <div class="form-group">
        {{ Form::label('projectname', 'تاريخ الطلب', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ substr($results->created_at, 0, 10) }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('projectname', 'اسم المؤسسة', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ $results->companyname }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('customername', 'الإسم كاملاً', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ $results->fullname }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('category_id', 'البريد الإلكتروني', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ $results->email }}
        </div>
    </div>   


    <div class="form-group">
        {{ Form::label('stages', 'الهاتف', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ $results->phone }}
        </div>
    </div>


    @if($results->facebookaccount)
    <div class="form-group">
        {{ Form::label('period', 'رابط فيسبوك', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            <a href="{{ $results->facebookaccount }}" target="_blank">
                {{ $results->facebookaccount }}
            </a>
        </div>
    </div>
    @endif


    @if($results->twitteraccount)
    <div class="form-group">
        {{ Form::label('period', 'رابط تويتر', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            <a href="{{ $results->twitteraccount }}" target="_blank">
                {{ $results->twitteraccount }}
            </a>
        </div>
    </div>
    @endif


    <div class="form-group">
        {{ Form::label('year', 'نوع الخدمة', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ $results->categoryname->title }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('vedio', 'تفاصيل الطلب', ['class' => 'col-sm-3']) }}
        <div class="col-sm-9">
            {{ $results->details }}
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">

            <a href="{{ asset('admin/orders/delete/'.$results->id) }}" class="btn Confirm btn-danger" title="حذف">
                <i class="glyphicon glyphicon-trash"></i> حذف الطلب
            </a>

            <a href="{{ asset('admin/orders/') }}" class="btn btn-primary" title="إستعراض الطلبات">
                 إستعراض الطلبات
            </a>

        </div>
    </div>

{!! Form::close() !!}

</div>
</div>
</div>

@endsection