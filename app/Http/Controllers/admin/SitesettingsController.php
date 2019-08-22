<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SiteSettingsRequest;
use App\Sitesetting;
use Session;

class SitesettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Sitesetting::get();
        return view('back.sitesettings.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.sitesettings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteSettingsRequest $request)
    {
        if($request->hasFile('siteicofile')){
            $siteIcoOpj        =   $request->file('siteicofile');
            $siteExtension     =   $siteIcoOpj->getClientOriginalExtension();
            $siteNewName       =   time() . rand(1,100) . "." . $siteExtension;
            $path  = $siteIcoOpj->storeas('public/images', $siteNewName);
        }


        if($request->hasfile('logofile')){
            $logoObj          =  $request->file('logofile');
            $logoExtension    =  $logoObj->getClientOriginalExtension();
            $logoNewName      =  time() . rand(1,100) . '.' . $logoExtension;
            $path   = $logoObj->storeas('public/images', $logoNewName);
        }
        Sitesetting::whereNotNull('id')->delete();
        Sitesetting::create($request->all() + ['siteico' => $siteNewName, 'logo' => $logoNewName]);
        Session::flash("msg", "s: شكراً لك, لقد تم إدخال إعدادات الموقع بنجاح");
        return redirect('admin/sitesettings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = Sitesetting::findOrFail($id);
        return view('back.sitesettings.edit', compact('results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiteSettingsRequest $request, $id)
    {
        $results = Sitesetting::findOrFail($id);
        $results->title         =  $request->title;
        $results->description   =  $request->description;
        $results->keywords      =  $request->keywords;
       

        if($request->hasFile('siteicofile')){
            unlink('storage/images/' . $results->siteico);
            $fileObject      =  $request->file('siteicofile');
            $extension       =  $fileObject->getClientOriginalExtension();
            $fileName        =  $fileObject->getClientOriginalName();
            $newName         =  time() . rand(1,100) . "." . $extension;
            $path  = $fileObject->storeas('public/images', $newName);
            $results->siteico  = $newName;
        }

        if($request->hasFile('logofile')){
            unlink('storage/images/' . $results->logo);
            $logoObject      = $request->file('logofile');
            $logoExtension   = $logoObject->getClientOriginalExtension();
            $logoName        = $logoObject->getClientOriginalName();
            $logoNewName     = time() . rand(1,100) . "." . $logoExtension;
            $path   = $logoObject->storeas('public/images', $logoNewName);
            $results->logo   = $logoNewName;
        }

        $results->save();

        Session::flash("msg", "S: شكراً, لقد تم تعديل إعدادات الموقع بنجاح");
        return redirect('admin/sitesettings');
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
