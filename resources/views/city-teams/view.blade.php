@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Einkaufshelfer-Team für: {{$city->city_name}} {{$city->zip_code}}</h2>
                </div>
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <h3><span class="badge badge-info">{{$city->city_team->getStatus()}}</span></h3>
                    <label for="hotline">Hotline</label>
                    <h3 class="hotline"><a href="tel:{{$city->city_team->hotline}}">{{$city->city_team->hotline}}</a>
                    </h3>
                    <label for="support_email">Support-Email</label>
                    <h3 class="hotline"><a
                            href="mailto:{{$city->city_team->team_email}}">{{$city->city_team->team_email}}</a>
                    </h3>
                    <label for="support_email">Beschreibung</label>
                    <h3 class="hotline">{{$city->city_team->description}}</h3>
                    <p class="card-text">Text</p>
                </div>
            </div>

        </div>
    </div>
@endsection
