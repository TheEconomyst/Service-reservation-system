<?php

namespace App\Http\Controllers;

use App\Util\Crud;
use App\Models\WorkSchedule;
use Illuminate\Http\Request;

class WorkScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(WorkSchedule::all(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fields = $request->validate([
            'time_from' => 'required|numeric',
            'time_to' => 'required|numeric',
            'service_provider_id' => 'required|numeric'
        ]);

        $workSchedule = new WorkSchedule([
            'time_from' => $fields['time_from'],
            'time_to' => $fields['time_to'],
            'service_provider_id' => $fields['service_provider_id']
        ]);

        return Crud::saveModel($workSchedule);
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
     * @param  \App\Models\WorkSchedule  $workSchedule
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Crud::showModel(WorkSchedule::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkSchedule  $workSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkSchedule $workSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkSchedule  $workSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkSchedule $workSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkSchedule  $workSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Crud::destroyModel(WorkSchedule::find($id))
    }
}
