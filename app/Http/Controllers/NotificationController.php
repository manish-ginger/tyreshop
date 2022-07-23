<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Shop;
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
        $row = Notification::latest()->get();
        $shops = Shop::latest()->get();
//        $row = $rows[0];
        return view('content.notification.index',compact('row','shops'));
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
        $shops_checkbox = request('shops');

        $shops = Shop::latest()->get();

        foreach ($shops as $shop)
        {
            if(isset($shops_checkbox)) {
                if (in_array($shop->id, $shops_checkbox)) {
                    $shop->update([
                        'shop_super_status' => 1,
                    ]);
                }
                else{
                    $shop->update([
                        'shop_super_status' => 0,
                    ]);
                }
            }
            else{
                $shop->update([
                    'shop_super_status' => 0,
                ]);
            }

        }


//        foreach ($notifications as $row) {
//            $notification = Notification::find($row->id);
//            $notification->update([
//                'super_status' => $super_status,
//            ]);
//        }

        return redirect()->route('notification')
            ->with('message', "Notification Settings Saved Successfully");
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
