<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'other_interest'=>'required',
            'vehicle_registration_number'=>'required',
            'client_details'=>'required',
            'vehicle_make'=>'required',
            'vehicle_model'=>'required',
            'chassis_number'=>'required',
            'engine_number'=>'required',
            'color'=>'required',
            'serial_number'=>'required',
            'date'=>'required'
        ]);

        $vehicle_registration_number=$request->input('vehicle_registration_number');
        $client_details=$request->input('client_details');
        $vehicle_make=$request->input('vehicle_make');
        $vehicle_model=$request->input('vehicle_model');
        $chassis_number=$request->input('chassis_number');
        $engine_number=$request->input('engine_number');
        $other_interest=$request->input('other_interest');
        $color=$request->input('color');
        $instal_date=$request->input('date');
        $serial=$request->input('serial_number');

        try {
            $vehicle=Vehicle::create([
                'other_interest'=>$other_interest,
                'vehicle_registration_number'=>$vehicle_registration_number,
                'client_details'=>$client_details,
                'vehicle_make'=>$vehicle_make,
                'vehicle_model'=>$vehicle_model,
                'chassis_number'=>$chassis_number,
                'engine_number'=>$engine_number,
                'color'=>$color,
                'serial'=>$serial,
                'instal_date'=>$instal_date
            ]);
            return redirect()->back()->with('successMsg','Vehicle Added successfully');
         } catch (\Exception $e) { // It's actually a QueryException but this works too
            if ($e->getCode() == 23000) {
                // Deal with duplicate key error  
                return redirect()->back()->with('errorMsg','This record already exists');
            }
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
    public function down()
    {
        Schema::dropIfExists('vehicle');
    }
}
