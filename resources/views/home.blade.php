@extends('back.layouts.master')

@section('title', 'لوحة التحكم')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">



                <div class="card-body">
                        @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                </div>
                        @endif
                            أهلا وسهلا بكم في لوحة التحكم الخاصة بموقع {{$sitename}}
                </div>

                

            </div>
        </div>
    </div>
</div>

@endsection
