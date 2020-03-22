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
            <form method="POST" action="{{route('cities.update', ['id' => $city->id])}}">
                <div class="form-group">
                    <label for="hotline">Deine Hotline</label>

                    <input class="form-control form-control-lg" name="hotline" id="hotline" value="">
                </div>
                <div class="form-group">
                    <label for="support_email">Deine Support-Email</label>

                    <input class="form-control form-control-lg" name="support_email" id="support_email" value="">
                </div>
                <button type="submit" class="btn btn-success">Speichern</button>
                <button type="submit" class="btn btn-dark">Speichern & Veröffentlichen</button>
            </form>
        </div>
    </div>
@endsection
