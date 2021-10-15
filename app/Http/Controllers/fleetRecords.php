<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class fleetRecords extends Controller
{
   public function index(){
       $vehicles = Vehicle::paginate(11);
       return view('records', compact('vehicles'));
   }
   public function print($id){
       $vehicle = Vehicle::find($id);
       return view('CertPdf', compact('vehicle'));
   }
   public function search(Request $request){

        $search = $request->input('vehicle_registration_number');

        $vehicles = Vehicle::query('id','vehicle_registration_number', 'client_details',
         'vehicle_make', 'vehicle_model', 'chassis_number', 'engine_number',
          'color')
          ->where('vehicle_registration_number', "%{$search}%")
          ->get();

        return view('search', compact('vehicles'))->with('successMsg','Vehicle Found');

     } 
   }

