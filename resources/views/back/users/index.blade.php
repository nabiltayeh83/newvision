@extends("back.layouts.master")

@section('title','إدارة المستخدمين')

@section("content")

        <div class="col-sm-12 text-right">
            <a class="btn btn-success" href="{{asset('admin/users/create')}}">
            <i class="glyphicon glyphicon-plus"></i>
          اضافة مستخدم جديد
        </a>
        </div>
      <hr>
    
	@if($results->count()>0)
    <table class="table table-hover table-striped">
    	<thead>
        	<tr>
                <th>الإسم</th>
            	<th>البريد الإلكتروني</th>
                <th>تاريخ الاضافة</th>
            	<th></th>
            </tr>
        </thead>
        <tbody>
        	@foreach($results as $r)
            <tr>
                <td>{{$r->name}}</td>
                <td>{{$r->email}}</td>
                <td>{{substr($r->created_at, 0, 10)}}</td>
            	<td>

                

                    @if($r->email != 'newvisionpal@gmail.com')
                	<a title='صلاحيات - {{$r->name}}' href="{{ asset('admin/users/permission/'.$r->id) }}"
                     class="btn btn-warning">
                    	<i class="glyphicon glyphicon-lock"></i>
                    </a>
                    @endif
               

                	<a href="{{ asset('admin/users/'.$r->id.'/edit') }}" class="btn btn-primary">
                    	<i class="glyphicon glyphicon-edit"></i>
                    </a>

                    @if($r->email != 'newvisionpal@gmail.com')
                	<a href="{{ asset('admin/users/delete/'.$r->id) }}" class="btn Confirm btn-danger">
                    	<i class="glyphicon glyphicon-trash"></i>
                    </a>
                    @endif
                

                </td>
            </tr>
            @endforeach()
        </tbody>
    </table>
    {{$results->links()}}
    @endif

@endsection()


