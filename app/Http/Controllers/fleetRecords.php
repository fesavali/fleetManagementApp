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
}
