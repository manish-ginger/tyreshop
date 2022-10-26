<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Session;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop_id=Session::get('Shop_ID');
        $row =Notification::where('shop_id','=',$shop_id)->get();
        if(isset($row[0])) {
            $row = $row[0];
            return view('content.notification.index', compact('row'));
        }
        return view('content.notification.index');
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
        $validated = $request->validate([
            'before_days' => 'required',
            'content' => 'required',
            'status' => 'required',
            'shop_status' => 'required',
        ]);

        $shop_id=Session::get('Shop_ID');
        $rows =Notification::where('shop_id','=',$shop_id)->get();


        if(count($rows)==1)
        {
            $id=$rows[0]->id;
            $data = Notification::find($id);

            $data->update([
                'before_days' => request('before_days'),
                'content' => request('content'),
                'status' => request('status'),
                'shop_status' => request('shop_status'),
                'shop_id' => $shop_id,
            ]);
        }


        if(count($rows)==0) {
            $data = new Notification();
            $data->shop_id =$shop_id;
            $data->before_days = request('before_days');
            $data->content = request('content');
            $data->status = request('status');
            $data->shop_status = request('shop_status');
            $data->save();
        }

        return 1;
//        return redirect()->route('notification')
//            ->with('message', "Notification Saved Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
