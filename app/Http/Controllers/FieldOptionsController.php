<?php

namespace App\Http\Controllers;

use App\Models\FieldOptions;
use Illuminate\Http\Request;

class FieldOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(FieldOptions::all(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fields = $request->validate([
            'text_option' => 'string',
            'integer_option' => 'numeric',
            'reservation_id' => 'required|numeric',
            'form_field_id' => 'required|numeric'
        ]);

        if ($fields['text_option'] === null && $fields['integer_option'] === null) {
            return respondInvalidFormData(
                    "At least one of the following must be set:"
                .   " text option or integer option"
            );
        }

        $fieldOption = new FieldOptions([
            'text_option' => $fields['text_option'],
            'integer_option' => $fields['integer_option'],
            'reservation_id' => $fields['reservation_id'],
            'form_field_id' => $fields['form_field_id']
        ]);

        Crud::saveModel($fieldOption);
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
     * @param  \App\Models\FieldOptions  $fieldOptions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Crud::showModel(FieldOptions::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FieldOptions  $fieldOptions
     * @return \Illuminate\Http\Response
     */
    public function edit(FieldOptions $fieldOptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FieldOptions  $fieldOptions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FieldOptions $fieldOptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldOptions  $fieldOptions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Crud::destroyModel(FieldOptions::find($id));
    }
}
