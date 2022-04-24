<?php

require_once('enum/ReservationStates.php');

namespace App\Http\Controllers;

use App\Util\Crud;
use App\Util\DateUtil;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return response($reservations, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /* TODO */
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
            "price" => "decimal|required",
            'provider_service_id' => 'numeric|required'
        ]);

        $reservation = new Reservation([
            'price' => $fields['price'],
            'provider_service_id' => $fields['provider_service_id'],
            'state' => RESERVATION_READY,
            'creation_date' => DateUtil::mysqlNow()
        ]);

        return Crud::saveModel($reservation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservations
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Crud::showModel(Reservation::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservations
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservations
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Crud::destroyModel(Reservation::find($id));
    }
}
