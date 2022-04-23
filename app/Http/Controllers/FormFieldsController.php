<?php

namespace App\Http\Controllers;

use App\Util\Crud;
use App\Models\FormFields;
use Illuminate\Http\Request;

class FormFieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(FormFields::all(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'field_type' => 'required|numeric',
            'is_mandatory' => 'required|boolean',
            'reservation_form_id' => 'required|numeric',
            'attached_data_type' => 'required|numeric'
        ]);

        if (!isValidAttachedDataType($fields['attached_data_type'])) {
            return Crud::respondInvalidFormData(
                'Attached data type value does not conform to enum. Must be 0 or 1.'
            );
        }

        $formField = new FormFields([
            'name' => $fields['name'],
            'field_type' => $fields['field_type'],
            'is_mandatory' => $fields['is_mandatory'],
            'reservation_form_id' => $fields['reservation_form_id']
            'attached_data_type' => $fields['attached_data_type']
        ]);

        return Crud::saveModel($formField);
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
     * @param  \App\Models\FormFields  $formFields
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Crud::showModel(FormFields::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormFields  $formFields
     * @return \Illuminate\Http\Response
     */
    public function edit(FormFields $formFields)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormFields  $formFields
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormFields $formFields)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormFields  $formFields
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormFields $formFields)
    {
        return Crud::destroyModel(FormFields::find($id));
    }
}
