<?php

namespace App\Http\Controllers\Auth;

use App\City;
use App\CityTeam;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        Log::debug('data validator', $data);

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'zip_code' => ['required', 'exists:cities,zip_code'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Log::info('user registered', $data);
        $this->registerCity($data, $user);

        return $user;
    }

    /**
     * Register the city and associate with
     * the created user account
     *
     * @param array $data
     * @param User $user
     */
    public function registerCity(array $data, User $user)
    {
        $cities = City::where('zip_code', $data['zip_code']);
        $cityTeam = new CityTeam();
        $cityTeam->contact()->associate($user);
        $cityTeam->save();
        if ($cities->count() === 1)
        {
            $cityTeam->cities()->save($cities->first());
            $user->cities()->save($cities->first());
        }
        if ($cities->count() > 1)
        {
            $cityTeam->cities()->saveMany($cities);
            $cities->each(function ($city) use ($user) {
                $city->owner()->associate($user);
                $city->save();
            });
        }
    }
}
