<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Packagerecord;
use App\Models\Customer;
use Illuminate\Http\Request;
use Session;


class PackagerecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop_id=Session::get('Shop_ID');
        $rows =Packagerecord::where('shop_id','=',$shop_id)->get();
        return view('content.packagerecord.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop_id=Session::get('Shop_ID');
        $customers = Customer::where('shop_id','=',$shop_id)->get();
        $packages = Package::where('shop_id','=',$shop_id)->get();
        return view('content.packagerecord.create', compact('customers','packages'));
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
            'customer_id' => 'required',
            'package_id' => 'required',
        ]);


                    if(Packagerecord::where('shop_id', 'LIKE', Session::get('Shop_ID'))->where('customer_id', 'LIKE', request('customer_id'))->where('package_id', 'LIKE', request('package_id'))->count() > 0) {
                        return 2;
//                return redirect()->route('packagerecord')
//                    ->with('message', "Not Added. Package Record already exists.");
            }


        $data = new Packagerecord();
        $data->customer_id = request('customer_id');
        $data->package_id = request('package_id');
        $data->shop_id =Session::get('Shop_ID');
        $data->save();


        return 1;
//        return redirect()->route('packagerecord.create')
//            ->with('message', "Package History Saved Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Packagerecord  $packagerecord
     * @return \Illuminate\Http\Response
     */
    public function show(Packagerecord $packagerecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Packagerecord  $packagerecord
     * @return \Illuminate\Http\Response
     */
    public function edit(Packagerecord $row,$id)
    {
        $shop_id =Session::get('Shop_ID');
        $id = decrypt($id);
        $customers = Customer::where('shop_id',$shop_id)->get();
        $packages = Package::where('shop_id',$shop_id)->get();
        $row = Packagerecord::find($id);
        return view('content.packagerecord.edit', compact('row','customers','packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Packagerecord  $packagerecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Packagerecord $packagerecord)
    {
        $validated = $request->validate([
            'customer_id' => 'required',
            'package_id' => 'required',
        ]);

        $id = decrypt(request('id'));
        $data = Packagerecord::find($id);

            if(($data->customer_id!=request('customer_id'))||($data->package_id!=request('package_id'))) {
                if (Packagerecord::where('shop_id', 'LIKE', Session::get('Shop_ID'))->where('customer_id', 'LIKE', request('customer_id'))->where('package_id', 'LIKE', request('package_id'))->count() > 0) {
                    return 2;
//                return redirect()->route('packagerecord')
//                    ->with('message', "Not Updated. Package Record already exists.");
                }
            }


        $data->update([
            'customer_id' => request('customer_id'),
            'package_id' => request('package_id'),
            'shop_id' => Session::get('Shop_ID'),
        ]);

        return 1;
//        return redirect()->route('packagerecord')
//            ->with('message', "Package History Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Packagerecord  $packagerecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packagerecord $packagerecord,$id)
    {
        $id = decrypt($id);
        $row = Packagerecord::where('id', $id);
        $row->delete();
        return 1;
//        return redirect()->route('packagerecord')
//            ->with('message', "Package History Removed Successfully");
    }
}
