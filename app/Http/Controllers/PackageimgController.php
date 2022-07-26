<?php

namespace App\Http\Controllers;

use App\Models\Packageimg;
use Illuminate\Http\Request;
use File;

class PackageimgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\packageimg  $packageimg
     * @return \Illuminate\Http\Response
     */
    public function show(packageimg $packageimg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\packageimg  $packageimg
     * @return \Illuminate\Http\Response
     */
    public function edit(packageimg $packageimg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\packageimg  $packageimg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, packageimg $packageimg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\packageimg  $packageimg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Packageimg $packageimg)
    {
        $id = trim(request('pkmg'),"packimg-");
        $paimgId = Packageimg::find($id);
        $paimgId->delete();
        if(File::exists(public_path($paimgId[0]->path))){
        File::delete(public_path($paimgId[0]->path));
        }
        return response()->json("message = Removed Successfully");
    }
}
