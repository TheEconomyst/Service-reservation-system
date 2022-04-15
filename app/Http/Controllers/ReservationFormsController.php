<?php

namespace App\Http\Controllers;

use App\Models\ReservationForms;
use Illuminate\Http\Request;

class ReservationFormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = ReservationForms::all();

        return response($forms, Response::HTTP_OK);
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

        $form = new ReservationForms([
            "name" => $fields["name"]
        ]);

        if ($form->save()) {
            return response([
                    "status" => "ok",
                    "form" => $form
                ], Response::HTTP_OK
            );
        } else {
            return response([
                "status" => "error",
                ], Response::HTTP_CONFLICT
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReservationForms  $reservationForms
     * @return \Illuminate\Http\Response
     */
    public function show(ReservationForms $reservationForms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReservationForms  $reservationForms
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservationForms $reservationForms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReservationForms  $reservationForms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservationForms $reservationForms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReservationForms  $reservationForms
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservationForms $reservationForms)
    {
        //
    }
}
