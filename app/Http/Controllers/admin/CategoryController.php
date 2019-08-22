<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Session;
use App\{
    Category,
    Service
    };

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Category::get();
        return view('back.categories.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if($request->hasFile('imagefile')){
            $imageObj         =   $request->file('imagefile');
            $imageExension    =   $imageObj->getClientOriginalExtension();
            $imageName        =   $imageObj->getClientOriginalName();
            $imageNewName     =   time() . rand(1,100) . "." . $imageExension;
            $path             =   $imageObj->storeas('public/images', $imageNewName);
        }

        Category::create($request->all() + ['image' => $imageNewName]);
        Session::flash("msg", "s: شكراً لك, لقد تم إنشاء تصنيف جديد بنجاح.");
        return redirect('admin/categories');
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


    public function active($id)
    {
        $results = Category::findOrFail($id);
        $results->is_active = 1 - $results->is_active;
        $results->save();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = Category::findOrFail($id);
        return view('back.categories.edit', compact('results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $results = Category::findOrFail($id);
        $results->title          =  $request->title;
        $results->description    =  $request->description;
        $results->is_active      =  $request->is_active;

        if($request->hasFile('imagefile')){
            $imgObject           =  $request->file('imagefile');
            $imgExtension        =  $imgObject->getClientOriginalExtension();
            $imgNewName          =  time() . rand(1,100) . "." . $imgExtension;
            $path    = $imgObject->storeas('public/images', $imgNewName);
            $results->image   = $imgNewName;
        }
        $results->save();
        Session::flash("msg", "s: شكراً لك, لقد تم تعديل بيانات التصنيف بنجاح.");
        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if(Service::where('category_id', $id)->count() > 0){
            Session::flash("msg", "w: عذراً, لا يمكن حذف هذا التصنيف لوجود خدمات تابعة له.");
       }
          else{
              $cat = Category::find($id);
              unlink('storage/images/' . $cat->image);
              $cat->delete();
              Session::flash("msg", "s: شكراً لك, لقد تم حذف التصنيف بنجاح.");
          }
        
          return redirect('admin/categories');
    }
}
