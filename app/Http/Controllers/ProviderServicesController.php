<?php

namespace App\Http\Controllers;

use App\Util\Crud;
use App\Models\ProviderServices;
use Illuminate\Http\Request;

class ProviderServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(ProviderServices::all(), Response::HTTP_OK);
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
        $fields = $request->validate([
            'duration' => 'required|numeric',
            'price' => 'required|decimal',
            'service_provider_id' => 'required|numeric',
            'service_id' => 'required|numeric'
        ]);

        $providerService = new ProviderServices([
            'duration' => $fields['duration'],
            'price' => $fields['price'],
            'service_provider_id' => $fields['service_provider_id'],
            'service_id' => $fields['service_id']
        ]);

        return Crud::saveModel($providerService);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProviderServices  $providerServices
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Crud::showModel(ProviderServices::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProviderServices  $providerServices
     * @return \Illuminate\Http\Response
     */
    public function edit(ProviderServices $providerServices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProviderServices  $providerServices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProviderServices $providerServices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProviderServices  $providerServices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Crud::destroyModel(ProviderServices::find($id));
    }
}
