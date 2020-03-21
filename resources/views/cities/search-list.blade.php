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
    </table>
    <div class="row">
        <div class="col-8">Für alle Stadteile gründen?</div>
        <div class="col-4 float-right">
            <form method="POST" action="">
                <input type="hidden" name="city_ids" value="{{$cities->pluck('id')}}">
                <input type="hidden" name="zip_code" value="{{$zip_code}}">
                <button type="submit" class="btn btn-primary btn-lg float-right">Ja, Weiter</button>
            </form>
        </div>
    </div>
@endsection
