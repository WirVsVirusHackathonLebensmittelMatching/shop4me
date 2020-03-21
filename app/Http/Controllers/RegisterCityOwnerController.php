<?php


namespace App\Http\Controllers;


use App\City;
use Illuminate\Http\Request;

class RegisterCityOwnerController {

    public function findZipCode(Request $request)
    {
        $cities = City::where('zip_code', $request->zip_code)->get();
        if ($cities->count() == 1)
        {
            return view('register', ['city' => $cities->first(), 'zip_code']);
        }
        elseif ($cities->count() > 1)
        {
            return view('cities.search-list', ['cities' => $cities, 'zip_code' => $request->zip_code]);
        }

        return view('errors.notfound', ['zip_code' => $request->zip_code]);
    }

    public function register(Request $request)
    {
        $ids = $request->city_ids;

        return view('register', ['city' => $cities->first(), 'zip_code']);
    }

}
