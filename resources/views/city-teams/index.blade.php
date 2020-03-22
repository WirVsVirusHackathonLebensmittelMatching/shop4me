@extends('layouts.app')
@section('content')
    <table class="table table-responsive-lg table-striped">
        <thead class="thead-light">
        <tr>
            <th>Städte</th>
            <th>Postleitzahlen</th>
            <th>Hotline</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($city_teams as $team)
            <tr>
                <td scope="row">
                    @foreach($team->cities->pluck('city_name') as $cityName)
                        {{$cityName}},<br>
                    @endforeach
                </td>
                <td>
                    @foreach($team->cities->pluck('zip_code')->unique() as $zipCode)
                        {{$zipCode}},<br>
                    @endforeach
                </td>
                <td>{{$team->hotline}}</td>
                <td>
                    <a class="btn btn-sm btn-success"
                       href="{{route('city-teams.view', ['id' => $team->cities->first()->id])}}"
                       title="Details zum Team">Details</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
