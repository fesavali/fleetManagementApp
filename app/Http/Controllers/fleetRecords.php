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
    $this->validate($request, [
        'vehicle_registration_number'=>'required'
    ]);
    $vehicle = $request->vehicle_registration_number;
       try {
        $vehicles = Vehicle::select('id','vehicle_registration_number', 'client_details',
         'vehicle_make', 'vehicle_model', 'chassis_number', 'engine_number',
          'color')->where('vehicle_registration_number', $vehicle)->get();

        return view('search', compact('vehicles'))->with('successMsg','Vehicle Found');
        
     } catch (\Exception $e) { // It's actually a QueryException but this works too
        if ($e->getCode() == 23000) {
            // Deal with duplicate key error  
            return view('records')->with('errorMsg','This record does not exist');
        }
     }
   }
}
