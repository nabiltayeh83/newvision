@extends("back.layouts.master")

@section('title','تعديل الملف الشخصي')

@section("content")
<div class="row">
	<div class="col-md-8">
   


{!! Form::open(array('files' => 'true',  'class' => 'form-horizontal')) !!}
            {{csrf_field()}}


             <input type="hidden" value="put" name="_method" />
          <div class="form-group">
            <label for="fullname" class="col-sm-3 control-label">الإسم بالكامل </label>
            <div class="col-sm-9">
              <input value="{{$results->name}}" type="text" class="form-control" id="name" name="name" placeholder="أدخل الإسم">
            </div>
          </div>


          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">البريد الإلكتروني </label>
            <div class="col-sm-9">
              <input value="{{$results->email}}"  readonly type="email" class="form-control" id="email" name="email" placeholder="أدخل البريد الإلكتروني ">
            </div>
          </div>
            
          
           <div class="form-group">
                    <label for="passwordunc" class="col-sm-3 control-label">كلمة المرور</label>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="اضف لاعادة  كلمة المرور"  name="passwordunc" id="passwordunc" type="text">
                    </div>
                </div>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-primary">حفظ</button>
              <a class="btn btn-default" href="{{asset('admin/users')}}">الغاء الأمر</a>
            </div>
          </div>
            </form>
    </div>
</div>

@endsection()






