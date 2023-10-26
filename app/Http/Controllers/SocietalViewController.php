<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocietalViewController extends Controller
{
    
    // Population
    public function population_entry(){
        return view('socital_entry.population_entry');
    }

    public function view_population(){
        return view('socital_view.view_population');
    }

    // Household
    public function view_household_entry(){
        return view('socital_entry.household_entry');
    }

    public function get_household_view(){
        return view('socital_view.view_household');
    }

    // Land 
    public function view_land_entry(){
        return view('socital_entry.land_entry');
    }

    // Occupation
    public function view_occupation_entry(){
        return view('socital_entry.occupation_entry');
    }

}
