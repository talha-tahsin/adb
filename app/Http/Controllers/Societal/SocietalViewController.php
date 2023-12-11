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

    // Income
    public function view_income_entry(){
        return view('societal_entry.income_entry');
    }

    // Expenditure
    public function view_expenditure_entry(){
        return view('societal_entry.expenditure_entry');
    }

    // Economic
    public function view_economic_entry(){
        return view('societal_entry.economic_entry');
    }

    // Education
    public function view_education_part1_entry(){
        return view('societal_entry.education_entry');
    }

    // Health
    public function view_health_entry(){
        return view('societal_entry.health_entry');
    }

    // Health
    public function view_water_entry(){
        return view('societal_entry.water_entry');
    }

    // Sanitation
    public function view_sanitation_entry(){
        return view('societal_entry.sanitation_entry');
    }

    // Accessibility
    public function view_accessibility_entry(){
        return view('societal_entry.accessibility_entry');
    }

}
