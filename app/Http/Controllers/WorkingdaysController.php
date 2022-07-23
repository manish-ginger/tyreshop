<?php

namespace App\Http\Controllers;

use App\Models\Workingdays;
use App\Http\Requests\StoreWorkingdaysRequest;
use App\Http\Requests\UpdateWorkingdaysRequest;

class WorkingdaysController extends Controller
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
     * @param  \App\Http\Requests\StoreWorkingdaysRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkingdaysRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workingdays  $workingdays
     * @return \Illuminate\Http\Response
     */
    public function show(Workingdays $workingdays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workingdays  $workingdays
     * @return \Illuminate\Http\Response
     */
    public function edit(Workingdays $workingdays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkingdaysRequest  $request
     * @param  \App\Models\Workingdays  $workingdays
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkingdaysRequest $request, Workingdays $workingdays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workingdays  $workingdays
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workingdays $workingdays)
    {
        //
    }
}
