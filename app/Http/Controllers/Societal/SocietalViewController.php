<?php

namespace App\Http\Controllers\Societal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocietalViewController extends Controller
{
    
    // Population
    public function population_entry(){
        return view('societal_entry.population_entry');
    }

    public function view_population(){
        return view('societal_view.view_population');
    }

    // Household
    public function view_household_entry(){
        return view('societal_entry.household_entry');
    }

    public function get_household_view(){
        return view('societal_view.view_household');
    }

    // Land 
    public function view_land_entry(){
        return view('societal_entry.land_entry');
    }

    // Occupation
    public function view_occupation_entry(){
        return view('societal_entry.occupation_entry');
    }

    // Livelihood
    public function view_livelihood_entry(){
        return view('societal_entry.livelihood_entry');
    }

    // Livelihood
    public function view_income_entry(){
        return view('societal_entry.income_entry');
    }

}
