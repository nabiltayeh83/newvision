@extends("back.layouts.master")

@section('title','الطلبات الواردة')

@section("content")

  
    @if($results->count()>0)
    @php $i=1; @endphp
    <table class="table table-hover table-striped">
    	<thead>
        	<tr>
                <th>#</th>
            	<th>إسم المؤسسة</th>
                <th>الإسم كاملاً</th>
                <th>الهاتف</th>
                <th>نوع الخدمة</th>
                <th>البريد الإلكتروني</th>
                <th>التاريخ</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	@foreach($results as $r)
            <tr>
                <th>{{$i++}}-</th>
                <td>{{$r->companyname}}</td>
                <td>{{$r->fullname}}</td>
                <td>{{$r->phone}}</td>
                <td>{{$r->categoryname->title}}</td>
                <td>{{$r->email}}</td>
                <td>{{substr($r->created_at, 0, 10)}}</td>
                <th>
                    <a href="{{ asset('admin/orders/'.$r->id) }}" class="btn btn-primary" title="إستعراض التفاصيل">
                    	<i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                </th>
            	<td>
                	<a href="{{ asset('admin/orders/delete/'.$r->id) }}" class="btn Confirm btn-danger" title="حذف">
                    	<i class="glyphicon glyphicon-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach()
        </tbody>
    </table>
    {{$results->links()}}
    @endif

@endsection()


