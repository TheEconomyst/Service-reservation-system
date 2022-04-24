<?php

namespace App\Http\Controllers;

use App\Util\Crud;
use App\Models\ProviderService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProviderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(ProviderService::all(), Response::HTTP_OK);
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

        $providerService = new ProviderService([
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
     * @param  \App\Models\ProviderService  $providerServices
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Crud::showModel(ProviderService::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProviderService  $providerServices
     * @return \Illuminate\Http\Response
     */
    public function edit(ProviderService $providerServices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProviderService  $providerServices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProviderService $providerServices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProviderService  $providerServices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Crud::destroyModel(ProviderService::find($id));
    }
}
