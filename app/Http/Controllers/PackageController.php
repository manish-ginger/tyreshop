<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Packageimg;
use App\Models\Packagevideo;
use Illuminate\Http\Request;
use File,Session;

class PackageController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::latest()->get();
        $packimages = Packageimg::latest()->get();
        return view('content.package.index', compact('packages', 'packimages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.package.create');
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
            'name' => 'required',
            'desc' => 'required',
            'loyalty_points' => 'required',
            'validity' => 'required',
        ]);

        if(Package::where('title', 'LIKE', request('name'))->count() > 0) {
            return 2;
//            return redirect()->route('package.create')
//                ->with('message', "Not Added. Package with this name already exists.");
        }

        $data = new Package;
        $data->title = request('name');
        $data->desc = request('desc');
        $data->loyalty_points = request('loyalty_points');
        $data->validity = request('validity');
        $data->shop_id = Session::get('Shop_ID');
        $data->save();
        $packId = $data->id;


        if ($request->hasfile('files')) {
            $validatedData = $request->validate([
                'files' => 'required',
                'files.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            foreach ($request->file('files') as $key => $file) {
                $name = 'Package_' . time() . $key . '.' . $file->extension();
                $path = 'assets/uploads/package/' . $name;
                $file->move(public_path('assets/uploads/package'), $name);
                $insert[$key]['pack_id'] = $packId;
                $insert[$key]['image'] = $name;
                $insert[$key]['path'] = $path;
            }
            packageimg::insert($insert);
        }

        return 1;
//        return redirect()->route('package.create')
//            ->with('message', "Package Saved Successfully");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\package  $package
     * @return \Illuminate\Http\Response
     */

    public function show(package $package, $packId)
    {
        $id = decrypt($packId);
        $package = Package::find($id);
        $packimages = Packageimg::where('pack_id', $id)->get();
        return view('content.package.show', compact('package', 'packimages'));
    }


    public function edit(package $package, $packId)
    {
        $id = decrypt($packId);
        $package = Package::find($id);
        $packimages = Packageimg::where('pack_id', $id)->get();
        return view('content.package.edit', compact('package', 'packimages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, package $package)
    {
        $validated = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'loyalty_points' => 'required',
        ]);

        $id = decrypt(request('packid'));
        $pack = Package::find($id);

        if($pack->title!=request('name')){
            if(Package::where('title', 'LIKE', request('name'))->count() > 0) {
                return 2;
//                return redirect()->route('package')
//                    ->with('message', "Not Updated. Package with this name already exists.");
            }
        }

        $pack->update([
            'title' => request('name'),
            'desc' => request('desc'),
            'loyalty_points' => request('loyalty_points'),
            'validity' => request('validity'),
            'shop_id' => Session::get('Shop_ID'),
        ]);
        $packId = $id;
        if ($request->hasfile('files')) {
            $validatedData = $request->validate([
                'files' => 'required',
                'files.*' => 'mimes:jpg,jpeg,png,gif'
            ]);
            foreach ($request->file('files') as $key => $file) {
                $name = 'Package_' . time() . $key . '.' . $file->extension();
                $path = 'assets/uploads/package/' . $name;
                $file->move(public_path('assets/uploads/package'), $name);
                $insert[$key]['pack_id'] = $packId;
                $insert[$key]['image'] = $name;
                $insert[$key]['path'] = $path;
            }
            packageimg::insert($insert);
        }
        else{
            $paimgId = Packageimg::where('pack_id', $packId);
            $paimgId->delete();
        }
        return 1;
//        return redirect()->route('package')
//            ->with('message', "Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(package $package, $packId)
    {
        $id = decrypt($packId);
        $paId = Package::where('id', $id);
        $paId->delete();
        $paimgId = Packageimg::where('pack_id', $id);
        $paimgId->delete();
        return 1;
//        return redirect()->route('package')
//            ->with('message', "Removed Successfully");
    }
}
