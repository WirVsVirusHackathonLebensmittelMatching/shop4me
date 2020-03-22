@extends('layouts.app')
@section('content')
    @guest
        <div class="row mb-5">
            <div class="col-6 mx-auto">
                <h1 class="text-center">
                    Starte dein Einkaufshilfe-Team <br>in deiner Stadt
                </h1>
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
                    <input name="" id="" class="btn btn-lg btn-success" type="submit" value="Einkaufshelfer-Team gründen">
                </form>
            </div>

        </div>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ihr seid nicht alleine</h5>
                        <p class="card-text">Gemeinsam mit dem Einkaufshilfe-Team aus Münster, haben wir diese Web App für euch entwickelt. Um euch und anderen schnell zu helfen, ein Team aufzubauen und eure Arbeit transparenter zu machen, dass auch jeder in deiner Stadt, der Hilfe braucht euch kennt und erreicht.</p>
                        <a href="#" class="btn btn-success">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Wissen</h5>
                        <p class="card-text">Ihr wisst nicht wo ihr anfangen sollt, um zu starten? Wir haben für euch Dokumente, FAQs, Google Spreadsheets und Formulare vorbereitet. Dokumente, die real von Einkaufshilfe-Teams in Münster und Frankfurt genutzt werden. Kopiert euch die Vorlagen und legt los!</p>
                        <a href="#" class="btn btn-success">Zu den Vorlagen</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mobilisieren</h5>
                        <p class="card-text">Ihr möchtet Teams lokal bei euch helfen und unter die Arme greifen? Sie brauchen viel Unterstützung. Mobiliert euch, helft einander. Gemeinsam überwinden wir die COVID-19 Krise. Alle Kontaktdaten findest du hier. Suche nach deiner PLZ und kontaktiere das Team direkt.</p>
                        <a href="#" class="btn btn-success">Team finden</a>
                    </div>
                </div>
            </div>
        </div>
    @endguest
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
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Einkaufshelfer Details</h5>
                            <p class="card-text">Vervollständige deine Einkaufshelfer Details. Wie Hotline, E-Mail,
                                etc.</p>
                            <a href="{{route('cities.edit', ['id'=> $city->id])}}"
                               class="btn btn-success">Bearbeiten</a>
                        </div>
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
                    <h3 class="text-center">Folgende Stadteile gehören zu deinem Team. <br>Sorge dich um sie. Danke euch. ❤️</h3>
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

    @endauth
@endsection
