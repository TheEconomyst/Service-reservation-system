<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('title', 'desc');
        return view('services.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'is_active' => 'required'
        ]);

        $service = new Service;
        $service->title = $request->input('text');
        $service->description = $request->input('text');
        $service->duration= $request->input('number');
        $service->price = $request->input('number');
        $service->is_active = $request->input('radio');

        $service->save();
        return redirect('/services')->with('success', 'Profile is is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('services.edit')->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'is_active' => 'required'
        ]);

        $service = new Service;
        $service->title = $request->input('text');
        $service->description = $request->input('text');
        $service->duration= $request->input('number');
        $service->price = $request->input('number');
        $service->is_active = $request->input('radio');

        $service->save();
        return redirect('/services')->with('success', 'Profile is is successfully created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect('/services')->with('success', 'Service is successfully deleted!');
    }
}
