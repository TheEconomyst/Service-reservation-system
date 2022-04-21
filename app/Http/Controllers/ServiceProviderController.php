<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceProviders = ServiceProvider::all();
        return response($serviceProviders, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fields = $request->validate([
            'description' => 'required|string',
            'is_company_admin' => 'required|boolean',
            'user_id' => 'required|numeric'
        ]);

        $provider = new ServiceProvider([
            'description' => $request['description'],
            'is_company_admin' => $fields['is_company_admin'],
            'user_id' => $fields['user_id'],
            'is_active' => true
        ]);

        if ($provider->save()) {
            return response($provider, Response::HTTP_CREATED);
        } else {
            return response('', Response::HTTP_CONFLICT);
        }
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
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = ServiceProvider::find($id);

        if ($provider == null) {
            return response('', Response::HTTP_NOT_FOUND);
        } else {
            return response($provider, Response::HTTP_OK);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceProvider $serviceProvider)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ServiceProvider::find($id)->delete();
    }
}
