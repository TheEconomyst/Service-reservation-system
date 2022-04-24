<?php

namespace App\Http\Controllers;

use App\Util\Crud;
use App\Models\Company;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Company::all(), Response::HTTP_OK);
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
            'name' => 'required|string',
            'company_code' => 'required|string'
        ]);

        $company = new Company([
            'name' => $fields['name'],
            'company_code' => $fields['company_code']
        ]);

        return Crud::saveModel($company, 'company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $companies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Crud::showModel(Company::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $companies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $companies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $companies)
    {
        return Crud::destroyModel(Company::find($id));
    }
}
