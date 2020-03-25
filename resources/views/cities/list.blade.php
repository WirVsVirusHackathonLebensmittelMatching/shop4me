@extends('layouts.app')

@section('content')
    <table class="table table-striped table-responsive-lg">
        <thead class="thead-light">
        <tr>
            <th>Lfd.Nr.</th>
            <th>Stadt</th>
            <th>PLZ</th>
            <th>Bundesland</th>
            <th>Kreis</th>
            <th>Hotline</th>
            <th>Kontakt</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach ($cities as $key => $city)
            <tr>
                <td scope="row">{{$key+1}}</td>
                <td>{{$city->city_name}}</td>
                <td>{{$city->zip_code}}</td>
                <td>{{$city->state}}</td>
                <td>{{$city->province}}</td>
                <td><a href="tel:{{$city->city_team->hotline}}">{{$city->city_team->hotline}}</a>
                </td>
                <td>{{$city->owner->name}}
                </td>
                <td>
                    <a class="btn btn-sm btn-success"
                       href="{{route('city-teams.view', ['id' => $city->id])}}"
                       title="Details zum Team{{$city->city_name}}">Details</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
