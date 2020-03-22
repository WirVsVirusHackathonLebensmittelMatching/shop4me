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
            <form method="POST" action="{{route('city-teams.update', ['id' => $city->city_team->id])}}">
                @csrf
                <div class="form-group">
                    <label for="hotline">Deine Hotline</label>

                    <input class="form-control form-control-lg" name="hotline" id="hotline"
                           value="{{$city->city_team->hotline}}">
                </div>
                <div class="form-group">
                    <label for="support_email">Deine Support-Email</label>

                    <input class="form-control form-control-lg" name="team_email" id="team_email"
                           value="{{$city->city_team->team_email}}">
                </div>
                <div class="form-group">
                    <label for="support_email">Beschreibung</label>
                    <textarea class="form-control" name="description" id="description"
                              rows="5">{{$city->city_team->description}}</textarea>
                </div>
                <button type="submit" name="action" value="save" class="btn btn-success">Speichern</button>
                <button type="submit" name="action" value="publish" class="btn btn-dark">Speichern & Veröffentlichen</button>
            </form>
        </div>
    </div>
@endsection
