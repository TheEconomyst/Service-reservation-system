<?php

namespace App\Http\Controllers;

use App\Util\Crud;
use App\Models\FieldOption;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FieldOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(FieldOption::all(), Response::HTTP_OK);
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
            return Crud::respondInvalidFormData(
                    "At least one of the following must be set:"
                .   " text option or integer option"
            );
        }

        $fieldOption = new FieldOption([
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
     * @param  \App\Models\FieldOption  $fieldOptions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Crud::showModel(FieldOption::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FieldOption  $fieldOptions
     * @return \Illuminate\Http\Response
     */
    public function edit(FieldOption $fieldOptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FieldOption  $fieldOptions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FieldOption $fieldOptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldOption  $fieldOptions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Crud::destroyModel(FieldOption::find($id));
    }
}
