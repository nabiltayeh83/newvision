<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Page;

use Session;
class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Page::get();
        return view('back.pages.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $results = Page::findOrFail($id);
        return view('back.pages.edit', compact('results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        $results  = Page::findOrFail($id);
        $results->title        =  $request->title;
        $results->details      =  $request->details;
        $results->filetitle    =  $request->filetitle;

        if($request->hasFile('photo')){
            $photoObj         =  $request->photo;
            $photoExtension   =  $photoObj->getClientOriginalExtension();
            $photoNewName     =  time() . rand(1,100) . "." . $photoExtension;
            $path   = $photoObj->storeas('public/images', $photoNewName);
            $results->image   = $photoNewName;
        }


        if($request->has('deletefileattach')){
            unlink('storage/upload/' . $results->fileattach);
            $results->fileattach = '';
        }


        if($request->hasFile('fileattachupload')){
            if($results->fileattach){
                unlink('storage/upload/' . $results->fileattach);
            }

            $fileAttachObj   = $request->file('fileattachupload');
            $fileExtension   = $fileAttachObj->getClientOriginalExtension();
            $fileNewName     = time() . rand(1,100) . "." . $fileExtension;
            $path  = $fileAttachObj->storeas('public/upload', $fileNewName);
            $results->fileattach   = $fileNewName;
        }

        $results->save();

        Session::flash("msg", "s: شكراً لك, لقد تم تعديل البيانات بنجاح.");
        return redirect('admin/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
