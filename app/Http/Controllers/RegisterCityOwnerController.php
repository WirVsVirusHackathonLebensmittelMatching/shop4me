<?php


namespace App\Http\Controllers;


use App\City;
use Illuminate\Http\Request;

class RegisterCityOwnerController extends Controller {

    public function findZipCode(Request $request)
    {
        $cities = City::where('zip_code', $request->zip_code)->get();
        if ($cities->count() == 1)
        {
            return redirect()->route('register')->with(['city_name' => $cities->first()->city_name, 'zip_code' => $request->zip_code]);
        }
        elseif ($cities->count() > 1)
        {
            return view('cities.search-list', ['cities' => $cities, 'zip_code' => $request->zip_code]);
        }

        return view('errors.notfound', ['zip_code' => $request->zip_code]);
    }

    public function registerCity(Request $request)
    {
        return redirect()->route('register')->with(['city_ids' => $request->city_ids, 'zip_code' => $request->zip_code]);
    }

    public function edit(int $id)
    {
        $city = City::find($id);

        return view('cities.edit')->with(['city' => $city]);
    }

    public function update(Request $request, int $id)
    {
        $city = City::find($id);
        $city->save($request->all());

        return view('cities.edit', ['city' => $city]);
    }

}
