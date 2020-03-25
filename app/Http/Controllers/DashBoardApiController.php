<?php

namespace App\Http\Controllers;

use App\City;
use App\CityTeam;
use Illuminate\Http\Response;

class DashBoardApiController extends Controller {

    public function __invoke()
    {
        $cities = City::whereNotNull('owner_id')
            ->get()
            ->filter(function ($city, $key) {
                if ($city->city_team()->exists())
                {
                    return $city->city_team->status === 1;
                }
            });

        $data['count_cities'] = $cities->pluck('city_name')->unique()->count();
        $data['count_states'] = $cities->pluck('state')->unique()->count();
        $data['count_zip_codes'] = $cities->pluck('zip_code')->count();
        $data['count_teams'] = CityTeam::all()->count();

        return response()->json(['data' => $data, 'success' => true, 'status' => 'ok', 'code' => Response::HTTP_OK], Response::HTTP_OK);
    }
}
