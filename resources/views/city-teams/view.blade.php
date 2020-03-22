@extends('layouts.app')
@section('content')
    <div class="row mb-5">
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
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Social Media</h3>
                </div>
                <div class="card-body">
                    <label for="facebook">Facebook</label>
                    <h3 class="facebook"><a href="{{$city->city_team->facebook}}" title="Facebook Link zu Einkaufshelfer in {{$city->city_name}}">{{$city->city_team->facebook}}</a>
                    </h3>
                    <label for="twitter">Twitter</label>
                    <h3 class="twitter"><a href="{{$city->city_team->twitter}}" title="Facebook Link zu Einkaufshelfer in {{$city->city_name}}">{{$city->city_team->twitter}}</a>
                    </h3>
                    <label for="twitter">Sonstige</label>
                    <h3 class="twitter"><a href="{{$city->city_team->others}}" title="Facebook Link zu Einkaufshelfer in {{$city->city_name}}">{{$city->city_team->others}}</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection
