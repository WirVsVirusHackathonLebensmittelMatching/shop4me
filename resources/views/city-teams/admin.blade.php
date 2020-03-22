@extends('layouts.app')
@section('content')
    @auth
        <div class="row mb-5">
            <div class="col-6 mx-auto">
                <h1 class="text-center">
                    Deine Stadt und Einkaufshelfer
                </h1>
            </div>
        </div>
        <div class="row">
            @if(!is_null($city))
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Einkaufshelfer Details</h5>
                        <p class="card-text">Vervollständige deine Einkaufshelfer Details. Wie Hotline, E-Mail,
                            etc.</p>
                        <a href="{{route('cities.edit', ['id'=> $city->id])}}"
                           class="btn btn-success">Bearbeiten</a>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Einkaufshelfer Details</h5>
                        <p class="card-text">Du hast noch keine Stadt für dein Team ausgesucht.</p>
                        <a href="/"
                           class="btn btn-success">Stadt finden</a>
                    </div>
                </div>
            @endif
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tools</h5>
                        <p class="card-text">Finde hilfreiche Tools, um deine Einkaufshilfe zu bewerben.</p>
                        <a href="#" class="btn btn-success">Anzeigen</a>
                    </div>
                </div>
            </div>
        </div>
        @if(!is_null($city))
            <div class="row mt-5">
                <div class="col">
                    <h3 class="text-center mb-5">Folgende Stadteile gehören zu deinem Team. <br>Sorge dich um sie. Danke
                        euch. ❤️</h3>
                    <table class="table table-striped">
                        <thead class="thead-light">
                        <tr>
                            <th>Stadt/Stadteil</th>
                            <th>PLZ</th>
                            <th>Bundesland</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($city->city_team->cities as $city)
                            <tr>
                                <td scope="row">{{$city->city_name}}</td>
                                <td>{{$city->zip_code}}</td>
                                <td>{{$city->state}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        @endif
        <div class="row mb-5">
            <div class="col-lg-6 mx-auto">
                <h3 class="text-center">
                    Weitere Stadt unterstützen?
                </h3>
                <form action="{{route('cities.find')}}" method="post">
                    <div class="form-group">
                        @csrf
                        <label for=""></label>
                        <input type="text"
                               class="form-control form-control-lg" name="zip_code" id="zip_code"
                               aria-describedby="helpId"
                               placeholder="PLZ">
                        <small id="helpId" class="form-text text-muted">Gebe deine PLZ ein</small>
                    </div>
                    <input name="" id="" class="btn btn-lg btn-success" type="submit"
                           value="Weitere Städte hinzufügen">
                </form>
            </div>
        </div>
    @endauth
@endsection
