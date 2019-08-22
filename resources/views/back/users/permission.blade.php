@extends("back.layouts.master")

@section('title', "تعديل صلاحيات المستخدم / $results->name")

@section("content")
<div class="row">
	<div class="col-md-8">

{!! Form::open(array('files' => 'true', 'id' => $results->id)) !!}
            {{csrf_field()}}

    <label>
    <input {{$results->hasPermissionTo('Sitesettings')?"checked":""}} type="checkbox" name="permission[1]" value="Sitesettings">
    <b>إعدادات الموقع</b></label><br>        
               
    <label>
    <input {{$results->hasPermissionTo('Categories')?"checked":""}} type="checkbox" name="permission[2]" value="Categories">
    <b>إدارة التصنيفات</b></label><br>

    <label>
    <input {{$results->hasPermissionTo('Services')?"checked":""}} type="checkbox" name="permission[3]" value="Services">
    <b>إدارة الخدمات</b></label><br>    

    <label>
    <input {{$results->hasPermissionTo('Pages')?"checked":""}} type="checkbox" name="permission[4]" value="Pages">
    <b>إدارة الصفحات</b></label><br>   


    <label>
    <input {{$results->hasPermissionTo('Orders')?"checked":""}} type="checkbox" name="permission[5]" value="Orders">
    <b>الطلبات الواردة</b></label><br>   


    <label>
    <input {{$results->hasPermissionTo('Users')?"checked":""}} type="checkbox" name="permission[6]" value="Users">
    <b>إدارة المستخدمين</b></label><br>

                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a class="btn btn-default" href="{{asset('admin/users')}}">الغاء الأمر</a>
        </form>
    </div>
</div>

@endsection()


