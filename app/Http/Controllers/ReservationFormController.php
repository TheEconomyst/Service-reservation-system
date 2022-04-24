<?php

namespace App\Http\Controllers;

use App\Util\Crud;
use App\Models\ReservationForm;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReservationFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(ReservationForm::all(), Response::HTTP_OK);
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
            "name" => "required|string"
        ]);

        $form = new ReservationForm([
            "name" => $fields["name"]
        ]);

        return Crud::saveModel($form, 'form');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReservationForm  $reservationForms
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Crud::showModel(ReservationForm::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReservationForm  $reservationForms
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservationForm $reservationForms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReservationForm  $reservationForms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservationForm $reservationForms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReservationForm  $reservationForms
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Crud::destroyModel(ReservationForm::find($id));
    }
}
