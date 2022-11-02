<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = banner::oldest()->get();
        return view('content.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'caption' => 'required',
        ]);

        $caption = request('caption');
        $file = request('files');
        $validatedData = $request->validate([
            'files' => 'required',
            'files.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            if($request->hasfile('files'))
             {
                    $name = 'Banner-Image_'.time().'.'.$file->extension();
                    $path = 'assets/uploads/banner/'.$name;
                    $file->move(public_path('assets/uploads/banner'), $name);
                    $insert['caption'] = $caption;
                    $insert['image'] = $name;
                    $insert['path'] = $path;
             }
        banner::insert($insert);
        return 1;
//        return redirect()->route('banner.create')
//        ->with('message',"Banner Saved Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(banner $banner, $packId)
    {
        $id = decrypt($packId);
        $banner = Banner::find($id);
        return view('content.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, banner $banner)
    {
        $validated = $request->validate([
            'caption' => 'required',
        ]);

        $caption = request('caption');
        $file = request('files');
        $id = decrypt(request('packid'));
        $pack = Banner::find($id);
        $packId = $id;
        if ($request->hasfile('files')) {
            $validatedData = $request->validate([
                'files' => 'required',
                'files.*' => 'mimes:jpg,jpeg,png,gif'
            ]);
            // foreach ($request->file('files') as $key => $file) {
                $name = 'Banner_' . time() . '.' . $file->extension();
                $path = 'assets/uploads/banner/' . $name;
                $file->move(public_path('assets/uploads/banner'), $name);
//                $insert['caption'] = $caption;
//                $insert['image'] = $name;
//                $insert['path'] = $path;
            // }
//            banner::insert($insert);
            $pack->update([
                'path' => $path,
                'caption' => $caption,
                'image' => $name,
            ]);
        }
        $pack->update([
            'caption' => $caption,
        ]);
        return 1;
//        return redirect()->route('banner.create')->with('message', "Banner Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(banner $banner, $bannerId)
    {
        $id = decrypt($bannerId);
        $baId = Banner::where('id',$id);
        $baId->delete();
        return 1;
//        return redirect()->route('banner')
//        ->with('message',"Removed Successfully");
    }
}
