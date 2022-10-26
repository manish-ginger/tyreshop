<?php

namespace App\Http\Controllers;

use App\Models\Machines;
use Illuminate\Http\Request;
use Session;
use File;

class MachinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop_id=Session::get('Shop_ID');
        $machines =Machines::where('shop_id','=',$shop_id)->get();
        return view('content.machine.index', compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.machine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMachinesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);

        if(Machines::where('title', 'LIKE', request('title'))->count() > 0) {
            return 2;
//            return redirect()->route('machine.create')
//                ->with('message', "Not Added. Machine with this name already exists.");
        }

        $data = new Machines();
        $data->shop_id =Session::get('Shop_ID');
        $data->title = request('title');
        $data->status = request('approved');
        $data->desc = request('desc');


        if ($request->hasfile('files')) {
            $validatedData = $request->validate([
                'files' => 'required',
                'files.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            foreach ($request->file('files') as $key => $file) {
                $name = 'Machine_' . time() . $key . '.' . $file->extension();
                $path = 'assets/uploads/machine/' . $name;
                $file->move(public_path('assets/uploads/machine'), $name);
                $data->image = $path;
            }

        }

        $data->save();

        return 1;
//        return redirect()->route('machine.create')
//            ->with('message', "Machine Saved Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function show(Machines $machine,$machineId)
    {
        $id = decrypt($machineId);
        $machine = Machines::find($id);
        return view('content.machine.show', compact('machine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function edit(Machines $machine, $machineId)
    {
        $id = decrypt($machineId);
        $machine = Machines::find($id);
        return view('content.machine.edit', compact('machine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMachinesRequest  $request
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Machines $machine)
    {
        $validated = $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);

        $id = decrypt(request('machineid'));
        $data = Machines::find($id);
        $request->has('approved') ? $approved = 1 : $approved = 0 ;

        if ($request->hasfile('files')) {
            $validatedData = $request->validate([
                'files' => 'required',
                'files.*' => 'mimes:jpg,jpeg,png,gif'
            ]);

            foreach ($request->file('files') as $key => $file) {
                $name = 'Machine_' . time() . $key . '.' . $file->extension();
                $path = 'assets/uploads/machine/' . $name;
                $file->move(public_path('assets/uploads/machine'), $name);
                $data->image = $path;
            }
        }
        else {
            if (request('verify_file') == 0)
            {
                if (File::exists(public_path($data->image))) {
                    File::delete(public_path($data->image));
                }
                $data->update([
                    'image' => '',
                ]);
            }
        }

        if($data->title!=request('title')){
            if(Machines::where('title', 'LIKE', request('title'))->count() > 0) {
                return 2;
//                return redirect()->route('machine')
//                    ->with('message', "Not Updated. Machine with this name already exists.");
            }
        }

        $data->update([
            'title' => request('title'),
            'desc' => request('desc'),
            'status' => $approved,
            'shop_id' => Session::get('Shop_ID'),
        ]);

        return 1;
//        return redirect()->route('machine')
//            ->with('message', "Machine Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machines $machines,$machineId)
    {
        $id = decrypt($machineId);
        $paId = Machines::where('id', $id);
        $paId->delete();
        return 1;
//        return redirect()->route('machine')
//            ->with('message', "Machine Removed Successfully");
    }
}
