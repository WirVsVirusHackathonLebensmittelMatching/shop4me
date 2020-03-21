@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach ($cities as $city)
            <tr>
                <td scope="row">{{$city->city_name}}</td>
                <td>{{$city->zip_code}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
