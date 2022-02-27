<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceProviders = ServiceProvider::orderBy('title', 'desc');
        return view('serviceProviders.index')->with('serviceProviders', $serviceProviders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serviceProviders.create');
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
            'name' => 'required',
            'last_name' => 'required',
            'description' => 'required',
            'role' => 'required'
        ]);

        $serviceProvider = new ServiceProvider;
        $serviceProvider->name = $request->input('name');
        $serviceProvider->last_name = $request->input('last_name');
        $serviceProvider->description= $request->input('text');
        $serviceProvider->role= $request->input('text');

        $serviceProvider->save();
        return redirect('/serviceProviders')->with('success', 'Service provider is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceProvider = serviceProvider::find($id);
        return view('serviceProviders.show')->with('serviceProvider', $serviceProvider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviceProvider = serviceProvider::find($id);
        return view('serviceProviders.edit')->with('serviceProvider', $serviceProvider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceProvider $serviceProvider)
    {
        $this->validate($request, [
            'name' => 'required',
            'last_name' => 'required',
            'description' => 'required',
            'role' => 'required'
        ]);

        $serviceProvider = new ServiceProvider;
        $serviceProvider->name = $request->input('text');
        $serviceProvider->last_name = $request->input('text');
        $serviceProvider->description= $request->input('text');
        $serviceProvider->role= $request->input('text');

        $serviceProvider->save();
        return redirect('/serviceProviders')->with('success', 'Service provider is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceProvider = serviceProvider::find($id);
        $serviceProvider->delete();
        return redirect('/serviceProviders')->with('success', 'Service provider is successfully deleted!');
    }
}
