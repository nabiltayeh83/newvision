@extends("back.layouts.master")



@section("content")
<div class="row">
	<div class="col-md-8">


{!! Form::open(['route' => 'admin.users.store', 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal', 
'id' => 'artical_form']) !!}
{{csrf_field()}}

          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">الإسم بالكامل </label>
            <div class="col-sm-9">
              <input value="{{old("name")}}" type="text" class="form-control" id="name" name="name" placeholder="الإسم">
            </div>
          </div>

    

          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">البريد الإلكتروني </label>
            <div class="col-sm-9">
              <input value="{{old("email")}}" type="email" class="form-control" id="email" name="email" placeholder="البريد الإلكتروني">
            </div>
          </div>
            
        <div class="form-group">
            <label for="passwordunc" class="col-sm-3 control-label">كلمة المرور</label>
            <div class="col-sm-9">
                <input type="text" value="{{old("passwordunc")}}" class="form-control" name="passwordunc" id="passwordunc" placeholder="كلمة المرور" required>
            </div>
        </div>

   

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-primary">اضافة</button>
              <a class="btn btn-default" href="{{asset('admin/users')}}">الغاء الأمر</a>
            </div>
          </div>
            </form>
    </div>
</div>

@endsection()

























@section("title")
اضافة مستخدم جديد
@endsection()


