<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::orderBy('expires_at', 'asc');
        return view('discounts.index')->with('discounts', $discounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'percentage' => 'required',
            'code' => 'required',
            'starts_at' => 'required',
            'expires_at' => 'required'
        ]);

        $Discount = new Discount;
        $Discount->percentage = $request->input('number');
        $Discount->code = $request->input('text');
        $Discount->starts_at= $request->input('date');
        $Discount->expires_at = $request->input('date');

        $Discount->save();
        return redirect('/discounts')->with('success', 'Discount code is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Discount = Discount::find($id);
        return view('discounts.show')->with('Discount', $Discount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Discount = Discount::find($id);
        return view('discounts.edit')->with('Discount', $Discount);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        $this->validate($request, [
            'percentage' => 'required',
            'code' => 'required',
            'starts_at' => 'required',
            'expires_at' => 'required'
        ]);

        $Discount = new Discount;
        $Discount->percentage = $request->input('number');
        $Discount->code = $request->input('text');
        $Discount->starts_at= $request->input('date');
        $Discount->expires_at = $request->input('date');

        $Discount->save();
        return redirect('/discounts')->with('success', 'Discount code is successfully created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Discount = Discount::find($id);
        $Discount->delete();
        return redirect('/discounts')->with('success', 'Discount code is successfully deleted!');
    }
}
