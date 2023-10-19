<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PopulationController extends Controller
{
    
    public function view_population(){
        return view('receipt.population');
    }

}
