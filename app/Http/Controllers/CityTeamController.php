<?php

namespace App\Http\Controllers;

use App\City;
use App\CityTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CityTeamController extends Controller {

    public function admin()
    {
        $city = null;
        if (Auth::check())
        {
            $user = \App\User::find(Auth::id());
            if ($user->cities()->exists())
            {
                $city = $user->cities->first();
            }
        }

        return view('city-teams.admin', ['city' => $city]);
    }

    public function view(int $id)
    {
        $city = City::find($id);

        return view('city-teams.view', ['city' => $city]);
    }

    public function update(Request $request, int $id)
    {
        $actions = ['save', 'publish'];
        $cityTeam = CityTeam::find($id);
        $data = $request->all();
        $cityTeam->description = $data['description'];
        $cityTeam->hotline = $data['hotline'];
        $cityTeam->team_email = $data['team_email'];
        $cityTeam->facebook = $data['facebook'];
        $cityTeam->twitter = $data['twitter'];
        $cityTeam->others = $data['others'];
        if (in_array($request->get('action'), $actions))
        {
            if ($request->get('action') === 'publish')
            {
                $cityTeam->status = 1;
            }
        }
        $cityTeam->save();
        $city = $cityTeam->cities()->first();

        return view('cities.edit', ['city' => $city, 'city_team' => $cityTeam->refresh()]);
    }
}
