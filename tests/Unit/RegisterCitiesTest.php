<?php


namespace Tests\Unit;


use App\Http\Controllers\RegisterCityOwnerController;
use App\User;
use Tests\TestCase;

class RegisterCitiesTest extends TestCase {

    public function testToRegisterCities()
    {
        $user = User::find(1);
        $cityTeam = $user->city_team;
        $controller = new RegisterCityOwnerController();
        $controller->registerCities('55120', $user);
        $this->assertDatabaseHas('cities', [
            'zip_code' => '55120',
            'owner_id' => $user->id,
            'city_team_id' => $user->city_team->id,
        ]);
    }
}
