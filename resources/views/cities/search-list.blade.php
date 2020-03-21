@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Ortsname</th>
            <th>PLZ</th>
            <th>Bundesland</th>
            <th>Aktion</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($cities as $key => $city)
            <tr>
                <td scope="row">{{$key+1}}</td>
                <td>{{$city->city_name}}</td>
                <td>{{$city->zip_code}}</td>
                <td>{{$city->state}}</td>
            </tr>
        @endforeach
        </tbody>
        <form method="">

        </form>
    </table>
@endsection
