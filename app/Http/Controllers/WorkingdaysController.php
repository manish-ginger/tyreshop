<?php

namespace App\Http\Controllers;

use App\Models\Workingdays;
use Illuminate\Http\Request;
use Session;

class WorkingdaysController extends Controller
{

    public function index()
    {
        $shop_id=Session::get('Shop_ID');
        $days=array('monday','tuesday','wednesday','thursday','friday','saturday','sunday');
        return view('content.workingdays.index', compact('days','shop_id'));
    }


    public function create()
    {
        return view('content.workingdays.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'days' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        $data = new Workingdays();
        $data->shop_id =Session::get('Shop_ID');
        $data->days = request('days');
        $data->from = request('from');
        $data->to = request('to');
        $data->save();

        return redirect()->route('workingdays.create')
            ->with('message', "Working Day Saved Successfully");
    }


    public function show(Workingdays $workingday)
    {
        //
    }


    public function edit(Workingdays $workingday, $workingdayId)
    {
        $day = decrypt($workingdayId);
        $shop_id=Session::get('Shop_ID');
        $workingday = Workingdays::where('days','=',$day)->where('shop_id','=',$shop_id)->first();
        return view('content.workingdays.edit', compact('workingday','day'));
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'day' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        $day = request('day');
        $shop_id=Session::get('Shop_ID');
        $data_update = Workingdays::where('days','=',$day)->where('shop_id','=',$shop_id)->first();
        $request->has('status') ? $status = 1 : $status = 0 ;

        if (is_null($data_update)) {
            $data = new Workingdays();
            $data->shop_id =$shop_id;
            $data->days = $day;
            $data->from = request('from');
            $data->to = request('to');
            $data->status = $status;
            $data->save();
        }
        else
        {
            $data_update->update([
                'shop_id' => $shop_id,
                'days' => $day,
                'from' => request('from'),
                'to' => request('to'),
                'status' => $status,
            ]);
        }

        return redirect()->route('workingdays')
            ->with('message', "Working days created successfully");
    }


    public function destroy(Workingdays $workingdays,$workingdayId)
    {
        $id = decrypt($workingdayId);
        $paId = WorkingDays::where('id', $id);
        $paId->delete();
        return redirect()->route('workingdays')
            ->with('message', "Working days Removed Successfully");
    }
}
