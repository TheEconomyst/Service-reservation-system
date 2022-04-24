<?php

namespace App\Http\Controllers;

use App\Util\Crud;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return response($services, Response::HTTP_OK);
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
            "name" => "required|string",
            "is_active" => "required",
            "description" => "required|string",
            "company_id" => "required"
        ]);

        $service = new Service([
            "name" => $request['name'],
            "is_active" => $request['is_active'],
            "description" => $request["description"],
            "company_id" => $request["company_id"]
        ]);

        return Crud::saveModel($service, 'service');
    }

    public function show($id)
    {
        return Crud::showModel(Service::find($id), 'service');
    }

    public function update(Request $request)
    {
        $fields = $request->validate([
            "name" => "required|string",
            "is_active" => "required",
            "description" => "required|string",
            "id" => "required|numeric",
            "company_id" => "required"
        ]);

        if (($service=Service::find($request->id))!=null) {
            $service->update([
                "name" => $request['name'],
                "is_active" => $request['is_active'],
                "description" => $request["description"],
                "company_id" => $request["company_id"]
            ]);
            return response(["status"=>"ok"], Response::HTTP_OK);
        }
        return response(["status"=>"not_found"], Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::destroy($id);
        return response(["status"=>"ok"], Response::HTTP_OK);
    }
}
