@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <span>Einkaufshelfer-Team für:</span>
            <h1>{{$city->city_name}}</h1>
            <h1>{{$city->zip_code}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8 mx-auto">
            <h3><span class="badge badge-info">{{$city->city_team->getStatus()}}</span></h3>
            <label for="hotline">Hotline</label>
            <h3 class="hotline"><a href="tel:{{$city->city_team->hotline}}">{{$city->city_team->hotline}}</a></h3>
            <label for="support_email">Support-Email</label>
            <h3 class="hotline"><a href="mailto:{{$city->city_team->team_email}}">{{$city->city_team->team_email}}</a>
            </h3>
            <label for="support_email">Beschreibung</label>
            <h3 class="hotline">{{$city->city_team->description}}</h3>
        </div>
    </div>
@endsection
