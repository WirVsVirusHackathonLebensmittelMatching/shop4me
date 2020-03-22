@extends('layouts.app')
@section('content')
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
                <input name="" id="" class="btn btn-lg btn-success" type="submit"
                       value="Einkaufshelfer-Team gründen">
            </form>
        </div>

    </div>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ihr seid nicht alleine</h5>
                    <p class="card-text">Gemeinsam mit dem Einkaufshilfe-Team aus Münster, haben wir diese
                        Web App für euch entwickelt. Um euch und anderen schnell zu helfen, ein Team
                        aufzubauen und eure Arbeit transparenter zu machen, dass auch jeder in deiner Stadt,
                        der Hilfe braucht euch kennt und erreicht.</p>
                    <a href="#" class="btn btn-success">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Wissen</h5>
                    <p class="card-text">Ihr wisst nicht wo ihr anfangen sollt, um zu starten? Wir haben für
                        euch Dokumente, FAQs, Google Spreadsheets und Formulare vorbereitet. Dokumente, die
                        real von Einkaufshilfe-Teams in Münster und Frankfurt genutzt werden. Kopiert euch
                        die Vorlagen und legt los!</p>
                    <a href="#" class="btn btn-success">Zu den Vorlagen</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mobilisieren</h5>
                    <p class="card-text">Ihr möchtet Teams lokal bei euch helfen und unter die Arme greifen?
                        Sie brauchen viel Unterstützung. Mobiliert euch, helft einander. Gemeinsam
                        überwinden wir die COVID-19 Krise. Alle Kontaktdaten findest du hier. Suche nach
                        deiner PLZ und kontaktiere das Team direkt.</p>
                    <a href="#" class="btn btn-success">Team finden</a>
                </div>
            </div>
        </div>
    </div>
@endsection
