@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    PDF Abreisszeitel
                </div>
                <div class="card-body">
                    <h4 class="card-title">Macht euch bekannt!</h4>
                    <p class="card-text">Füge deine Daten ein und du erhälst per E-Mail deinen Abreisszettel mit
                        vorgefertigten Formulierungen für deine Stadt. Falls du eingeloggt bist, werden die Felder
                        automatisch befüllt.</p>
                    @guest
                        <form method="GET"
                              action="https://script.google.com/macros/s/AKfycbwBBlhhQJaEAxATAbS-_9-O94ZXTe8kOKN50t_TDxNwK-Hmrjk/exec?">
                            <div class="form-group">
                                <label for="tel">Hotline</label>
                                <input class="form-control" name="tel" type="text" value="">
                            </div>
                            <div class="form-group">
                                <label for="mail">E-Mail</label>
                                <input class="form-control" name="mail" type="email" value="">
                            </div>
                            <div class="form-group">
                                <label for="mail">Stadt</label>
                                <input class="form-control" name="ort" type="text" value="">
                            </div>
                            <button class="btn btn-success" type="submit" name="action" value="google_pdf_render">PDF
                                generieren
                            </button>
                        </form>
                    @endguest
                    @auth
                        <form method="GET"
                              action="https://script.google.com/macros/s/AKfycbwBBlhhQJaEAxATAbS-_9-O94ZXTe8kOKN50t_TDxNwK-Hmrjk/exec?">
                            <div class="form-group">
                                <label for="tel">Hotline</label>
                                <input class="form-control" name="tel" type="text"
                                       value="{{auth()->user()->city_team->hotline}}">
                            </div>
                            <div class="form-group">
                                <label for="mail">E-Mail</label>
                                <input class="form-control" name="mail" type="email"
                                       value="{{auth()->user()->city_team->team_email}}">
                            </div>
                            <div class="form-group">
                                <label for="ort">Stadt</label>
                                <select name="ort" class="city-select" id="city-select" required>
                                @foreach(auth()->user()->city_team->cities as $city)
                                    <option value="{{$city->city_name}}">{{$city->city_name}}, {{$city->zip_code}}</option>
                                @endforeach
                                </select>
                            </div>
                            <button class="btn btn-success" type="submit" name="action" value="google_pdf_render">PDF
                                generieren
                            </button>
                        </form>
                    @endauth
                </div>
                <div class="card-footer text-muted">
                    Es kann 1-3 Sekunden dauern. Habe etwas Geduld.
                </div>
            </div>

        </div>
    </div>
@endsection
