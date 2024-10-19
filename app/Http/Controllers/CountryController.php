<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class CountryController extends Controller
{
    public function getCountries()
    {
        $data = Country::get();
        return response()->json($data);

    }

   

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function getStates(Request $request)
    {
        //$country = Country::where('id', $request->country_id);
        //$data = $country->states();
        $data = State::where('country_id', $request->country_id)->get();
        return response()->json($data);

    }
}
