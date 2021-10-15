<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fleetRecords extends Controller
{
   public function index(){
       return view('records');
   }
}
