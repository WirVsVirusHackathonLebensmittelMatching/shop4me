<?php


namespace App\Http\Controllers;


use App\City;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterCityOwnerController extends Controller {

    public function index()
    {
        $city = null;
        if (Auth::check())
        {
            $user = User::find(Auth::id());
            if ($user->cities()->exists())
            {
                $city = $user->cities->first();
            }
        }

        return view('welcome', ['city' => $city]);
    }

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
