<?php


namespace App\Http\Controllers;


use App\City;
use App\CityTeam;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterCityOwnerController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

        $cities = City::whereNotNull('owner_id')
            ->get()
            ->filter(function ($city, $key) {
                if ($city->city_team()->exists())
                {
                    return $city->city_team->status === 1;
                }
            });

        return view('welcome', ['city' => $city, 'cities' => $cities]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function findZipCode(Request $request)
    {
        $cities = City::where('zip_code', $request->zip_code)->get()
            ->where('city_team_id', null);

        if ($cities->count() > 0)
        {
            return view('cities.search-list', ['cities' => $cities, 'zip_code' => $request->zip_code]);
        }

        return view('errors.notfound', ['zip_code' => $request->zip_code]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerCity(Request $request)
    {
        if (!Auth::check())
        {
            return redirect()->route('register')->with(['city_ids' => $request->city_ids, 'zip_code' => $request->zip_code]);
        }
        $this->registerCities($request->zip_code, User::find(Auth::id()));

        return redirect()->route('admin.home')->with(['city_ids' => $request->city_ids, 'zip_code' => $request->zip_code]);
    }

    /**
     * Register the cities and associate with
     * the created user account
     *
     * @param array $data
     * @param User $user
     */
    public function registerCities(string $zipCode, User $user)
    {
        $cities = City::where('zip_code', $zipCode);
        $cityTeam = CityTeam::find($user->city_team->id);
        if ($cities->count() === 1)
        {
            $city = $cities->first();
            $user->cities()->save($city);
            $city->city_team()->associate($cityTeam);
            $city->save();
        }
        if ($cities->count() > 1)
        {
            $cities->each(function ($city) use ($user, $cityTeam) {
                $city->owner()->associate($user);
                $city->city_team()->associate($cityTeam);
                $city->save();
            });
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $city = City::find($id);

        return view('cities.edit')->with(['city' => $city]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, int $id)
    {
        $city = City::find($id);
        $city->save($request->all());

        return view('cities.edit', ['city' => $city]);
    }

}
