<?php

namespace App\Http\Controllers;

use App\CityTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CityTeamController extends Controller {

    public function update(Request $request, int $id)
    {
        $actions = ['save', 'publish'];
        Log::debug('update team', $request->all());
        $cityTeam = CityTeam::find($id);
        $data = $request->all();
        $cityTeam->description = $data['description'];
        $cityTeam->hotline = $data['hotline'];
        $cityTeam->team_email = $data['team_email'];
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
