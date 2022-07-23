<?php

namespace App\Http\Controllers;

use App\Models\WashingType;
use Illuminate\Http\Request;
use File;

class WashingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $washingtypes = WashingType::latest()->get();
        return view('content.washingtype.index', compact('washingtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.washingtype.create');
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
        ]);

        if(WashingType::where('name', 'LIKE', request('name'))->count() > 0) {
            return redirect()->route('washingtype.create')
                ->with('message', "Not Added. Washing type with this name already exists.");
        }


        $data = new WashingType;
        $data->name = request('name');
        $data->desc = request('desc');

        if ($request->hasfile('image')) {
            $validatedData = $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $image=$request->file('image');
            $name = 'WashingType_' . time() . '.' . $image->extension();
            $path = 'assets/uploads/washingtype/' . $name;
            $image->move(public_path('assets/uploads/washingtype'), $name);
            $data->image = $path;
        }


        $data->save();


        return redirect()->route('washingtype.create')
            ->with('message', "Washing type Saved Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WashingType  $washingType
     * @return \Illuminate\Http\Response
     */
    public function show(WashingType $washingType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WashingType  $washingType
     * @return \Illuminate\Http\Response
     */
    public function edit(WashingType $washingType,$washingTypeId)
    {
        $id = decrypt($washingTypeId);
        $washingtype = WashingType::find($id);
        return view('content.washingtype.edit', compact('washingtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WashingType  $washingType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WashingType $washingType)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $id = decrypt(request('washingtypeid'));
        $washingtype = WashingType::find($id);

        if ($request->hasfile('image')) {
            $validatedData = $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $image=$request->file('image');

            $name = 'WashingType_' . time() . '.' . $image->extension();
            $path = 'assets/uploads/washingtype/' . $name;
            $image->move(public_path('assets/uploads/washingtype/'), $name);
            $washingtype->update([
                'image' => $path,
            ]);
        }
        else {
            if (request('verify_file') == 0)
            {
            if (File::exists(public_path($washingtype->image))) {
                File::delete(public_path($washingtype->image));
            }
            $washingtype->update([
                'image' => '',
            ]);
        }
        }

        if ($washingtype->name != request('name')){
            if (WashingType::where('name', 'LIKE', request('name'))->count() > 0) {
                return redirect()->route('washingtype.create')
                    ->with('message', "Not Added. Washing type with this name already exists.");
            }
        }

        $washingtype->update([
            'name' => request('name'),
            'desc' => request('desc'),
        ]);


        return redirect()->route('washingtype')
            ->with('message', "Washing type Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WashingType  $washingType
     * @return \Illuminate\Http\Response
     */
    public function destroy(WashingType $washingType,$washingTypeId)
    {
        $id = decrypt($washingTypeId);
        $paId = WashingType::where('id', $id);
        $paId->delete();
        return redirect()->route('washingtype')
            ->with('message', "Washing type Removed Successfully");
    }
}
