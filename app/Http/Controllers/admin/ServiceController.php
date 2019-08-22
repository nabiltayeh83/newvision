<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use Intervention\Image\ImageManagerStatic as Image;

use Session;
use App\{
    Category,
    Service
};

use App\Image as ImageModel;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $key = $request->key;

        $results  = Service::where('projectname', 'like', "%$key%")
                             ->orwhere('customername', 'like', "%$key%")
                             ->orwhere('stages', 'like', "%$key%")
                             ->orwhere('period', 'like', "%$key%")
                             ->orwhere('year', 'like', "%$key%");

        $results = $results->orderBy('id', 'desc')->paginate(10)->appends(array('key' => $key));
                    
        return view('back.services.index', compact('results', 'key'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');
        return view('back.services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(ServiceRequest $request)
    {
        if($request->hasFile('fileattachupload')){
            $fileAttachOpj         =  $request->file('fileattachupload');
            $fileAttachExtension   =  $fileAttachOpj->getClientOriginalExtension();
            $fileAttachNewName     =  time() . rand(1,100) . "." . $fileAttachExtension;
            $path    = $fileAttachOpj->storeas('public/upload', $fileAttachNewName);
        } else { $fileAttachNewName = ""; }

        if($request->hasFile('imagefile')){
            $imgObj            =  $request->file('imagefile');
            $imgExtension      =  $imgObj->getClientOriginalExtension();
            $imgNewName        =  time() . rand(1,100) . "." . $imgExtension;

            Image::make($imgObj)->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('storage/images/thumb/'. $imgNewName);

            Image::make($imgObj)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('storage/images/'. $imgNewName);
        }

        $newservice = Service::create($request->all() + ['fileattach' => $fileAttachNewName, 'image' => $imgNewName]);

        if(is_array($request->album)){
            foreach($request->album as $itm){
                $itmExtension    =  $itm->getClientOriginalExtension();
                $itmNewName      =  time() . rand(1,100) . rand(10,100) . "." . $itmExtension;
                Image::make($itm)->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('storage/images/'. $itmNewName);
                ImageModel::create(['service_id' => $newservice->id, 'image' => $itmNewName]);
            }
        }

        Session::flash("msg", "s: شكراً لك, لقد تم إدخال الخدمة بنجاح");
        return redirect('admin/services');
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
        $results = Service::findOrFail($id);
        $categories = Category::pluck('title', 'id');
        return view('back.services.edit', compact('results', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $results  =  Service::findOrFail($id);

        $results->projectname       =   $request->projectname;
        $results->customername      =   $request->customername;
        $results->category_id       =   $request->category_id;
        $results->stages            =   $request->stages;
        $results->period            =   $request->period;
        $results->year              =   $request->year;
        $results->vedio             =   $request->vedio;
        $results->filetitle         =   $request->filetitle;
        $results->is_active         =   $request->is_active;

        if($request->has('deletefileattach')){
        unlink('storage/upload/' . $results->fileattach);
        $results->fileattach = '';
        }

        if($request->hasFile('fileattachupload')){

            if($results->fileattach){
                unlink('storage/upload/' . $results->fileattach);
                $results->fileattach = '';
            }
                $fileAttachObj          =  $request->file('fileattachupload');
                $fileAttachExtension    =  $fileAttachObj->getClientOriginalExtension();
                $fileAttachNewName      =  time() . rand(1,100) . "." . $fileAttachExtension;
                $fileAttachObj->storeas('public/upload', $fileAttachNewName);
                $results->fileattach   =  $fileAttachNewName;
            }

            if($request->hasFile('imagefile')){
                unlink('storage/images/' . $results->image);
                unlink('storage/images/thumb/' . $results->image);

                $imgObj            =  $request->file('imagefile');
                $imgExtension      =  $imgObj->getClientOriginalExtension();
                $imgNewName        =  time() . rand(1,100) . "." . $imgExtension;
    
                Image::make($imgObj)->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('storage/images/thumb/'. $imgNewName);
    
                Image::make($imgObj)->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('storage/images/'. $imgNewName);
                $results->image  = $imgNewName;
            }


            if(is_array($request->album)){
                foreach($request->album as $itm){
                    $itmExtension    =  $itm->getClientOriginalExtension();
                    $itmNewName      =  time() . rand(1,100) . rand(10,100) . "." . $itmExtension;
                    Image::make($itm)->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save('storage/images/'. $itmNewName);
                    ImageModel::create(['service_id' => $id, 'image' => $itmNewName]);
                }
            }


            if(is_array($request->oldimages)){
                foreach($request->oldimages as $itm){
                    $albumImg   = ImageModel::findOrFail($itm);
                    unlink('storage/images/' . $albumImg->image);
                    $albumImg->delete();
                }
            }




        $results->save();
        Session::flash("msg", "s: شكراً لك, لقد تم تعديل البيانات بنجاح.");
        return redirect('admin/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function active($id){
        $results = Service::findOrFail($id);
        $results->is_active = 1 - $results->is_active;
        $results->save();
    }


    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        unlink("storage/images/" .$service->image);
        unlink("storage/images/thumb/" .$service->image);
        if($service->fileattach){
            unlink("storage/upload/" .$service->fileattach);
        }
        $service->delete();


        $album = ImageModel::where('service_id', $id)->get();
        foreach($album as $itm){
            unlink("storage/images/" .$itm->image);
        }
        ImageModel::where('service_id', $id)->delete();

        Session::flash("msg", "w: شكراً لك, لقد تم حذف البيانات بنجاح.");
        return redirect('admin/services');
    }
}
