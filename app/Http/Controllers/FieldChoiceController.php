<?php

namespace App\Http\Controllers;

use App\Util\Crud;
use App\Models\FieldChoice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FieldChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(FieldChoice::all(), Response::HTTP_OK);
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
            'form_field_id' => 'required|numeric',
            'resevation_id' => 'required|numeric',
            'choice' => 'required|string'
        ]);

        $fieldChoice = new FieldChoice([
            'form_field_id' => $fields['form_field_id'],
            'resevation_id' => $fields['resevation_id'],
            'choice' => $fields['choice']
        ]);

        return Crud::saveModel($fieldChoice);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldChoices  $fieldChoices
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Crud::showModel(FieldChoice::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FieldChoices  $fieldChoices
     * @return \Illuminate\Http\Response
     */
    public function edit(FieldChoices $fieldChoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FieldChoices  $fieldChoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FieldChoice $fieldChoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldChoices  $fieldChoices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Crud::destroyModel(FieldChoice::find($id));
    }
}
