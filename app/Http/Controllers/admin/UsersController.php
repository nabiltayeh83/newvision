<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



use Intervention\Image\ImageManagerStatic as Image;

use DB;
use App\{
    User,
    Page,
    Post
    };
use Session;
use App\Image as ImageAlbum;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \Auth; 

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = User::paginate(10);
        return view('back.users.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if(User::where('email',  $request->email)->count() > 0){
            Session::flash('msg', 'w: البريد الإلكتروني مدخل من قبل');
            return redirect('admin/users');
        }
        
        User::create($request->all() + ['password' => bcrypt($request->passwordunc)]);
        Session::flash('msg', 's: شكراً لك, لقد تم إضافة البيانات بنجاح');
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = User::findOrFail($id);
        return view('back.users.edit', compact('results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $results = User::find($id);
        $results->name              =  $request->name;

        if($request->passwordunc){
            $results->password   = bcrypt($request->passwordunc);
        }

        $results->save();
        Session::flash('msg', 's: شكرا لك, لقد تم تعديل البيانات بنجاح');
        return redirect('admin/users');
    }



    public function updateprofile()
    {
        $id = auth()->user()->id;
        $results = User::findOrFail($id);
        return view("back.users.updateprofile", compact("id", "results"));
    }


    public function setupdateprofile(Request $request)
    {
        $id = auth()->user()->id;
        $results = User::find($id);
        $results->name              =  $request->name;

        if($request->passwordunc){
            $results->password   = bcrypt($request->passwordunc);
        }

        $results->save();
        Session::flash('msg', 's: شكرا لك, لقد تم تعديل البيانات بنجاح');
        return redirect('admin/users/updateprofile');
  
       
    }


    public function permission($id)
    {
        $results = User::findOrFail($id);
        return view("back.users.permission",compact("id", "results"));
    }


    public function setpermission(Request $request,$id)
    {
        $results = User::find($id);
        DB::table("model_has_permissions")->where("model_id",$id)->delete();
        DB::table("model_has_roles")->where("model_id",$id)->delete();

        if (is_array($request->permission)) {
        foreach($request->permission as $permission){
            if($permission){
            $results->givePermissionTo($permission);
            }
        }
    }
        Session::flash("msg","s:تمت عملية تغيير الصلاحيات بنجاح");
        return redirect("/admin/users");
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  
            User::find($id)->delete();
            DB::table("model_has_permissions")->where("model_id",$id)->delete();
            DB::table("model_has_roles")->where("model_id",$id)->delete();
            Session::flash('msg', 's: شكراً لك, لقد تم حذف البيانات بنجاح');
            return redirect('admin/users');
      
    }
}
