@extends('layouts.app')
@section('content')
    <section>
        <div class="row mb-5">
            <div class="col-lg-6 mx-auto">
                <p class="text-center">
                    <img src="{{asset('images/stadt-grafik.svg')}}" alt="Stadt Illustration" class="img-fluid">
                </p>
                <h1 class="text-center">
                    Starte dein Einkaufshilfe-Team <br>in deiner Stadt
                </h1>

                @auth
                    @if(auth()->user()->cities_count === 0)
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
                    @else
                        <div class="alert alert-success" role="alert">
                            <strong> Du hast bereits eine Stadt für dein Team registriert. Du möchtest noch weitere
                                Stadtteile hinzufügen? Fühle dich gedrückt und bleibe gesund. Unter "Meiner Stadt"
                                kannst du weitere hinzufügen.
                                🌡️
                            </strong>
                        </div>
                        <a class="btn btn-lg btn-success float-right" href="{{route('admin.home')}}"
                           title="Stadt bearbeiten">Zu meiner Stadt</a>
                    @endif
                @endauth
                @guest
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
                @endguest
            </div>

        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ihr seid nicht alleine</h5>
                        <p class="card-text">Gemeinsam mit dem <a
                                href="https://www.allesmuenster.de/wwu-studierende-organisieren-einkaufshilfe/"
                                title="Einkaufshilfe-Team Münster">Einkaufshilfe-Team aus Münster</a>, haben wir diese
                            Web App für euch entwickelt. Um euch und anderen schnell zu helfen, ein Team
                            aufzubauen und eure Arbeit transparenter zu machen, dass auch jeder in deiner Stadt,
                            der Hilfe braucht euch kennt und erreicht.</p>
                        <a href="{{route('city-teams.index')}}" class="btn btn-success">Einkaufshelfer-Teams</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12  mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Wissen</h5>
                        <p class="card-text">Ihr wisst nicht wo ihr anfangen sollt um zu starten? Wir haben für
                            euch Dokumente, FAQs, Google Spreadsheets und Formulare vorbereitet. Dokumente, die
                            real von Einkaufshilfe-Teams in Münster und Frankfurt genutzt werden. Kopiert euch
                            die Vorlagen und legt los! Auch in unserem <a
                                href="https://github.com/WirVsVirusHackathonLebensmittelMatching/shop4me/wiki"
                                title="Github Wiki für Einkaufshelfer">Wiki</a>.</p>
                        <a href="https://drive.google.com/drive/folders/1DhRRVY6NT04CoTKzB3esUG5cfQWgwpSx"
                           target="_blank" class="btn btn-success">Zu den Vorlagen</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mobilisieren</h5>
                        <p class="card-text">Ihr möchtet Teams lokal bei euch helfen und unter die Arme greifen?
                            Sie brauchen viel Unterstützung. Mobilisiert euch, helft einander. Gemeinsam
                            überwinden wir die COVID-19 Krise. Alle Kontaktdaten findest du hier. Suche nach
                            deiner PLZ und kontaktiere das Team direkt.</p>
                        <a href="#" class="btn btn-success">Team finden</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($cities->count() > 0)
        <section>
            <div class="row mt-5">
                <div class="col-lg-5 mx-auto">
                    <img src="{{asset('images/stadt-pin-grafik.svg')}}" alt="Stadt Illustration mit Pin und Bogen"
                         class="img-fluid">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 table-responsive-lg">

                    <h3 class="text-center mb-5">Kürzlich hinzugefügte Städte von Einkaufshelfern.️</h3>
                    <table class="table table-striped">
                        <thead class="thead-light">
                        <tr>
                            <th>Stadt</th>
                            <th>PLZ</th>
                            <th>Bundesland</th>
                            <th>Hotline</th>
                            <th>Kontakt</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $city)
                            <tr>
                                <td scope="row">{{$city->city_name}}</td>
                                <td>{{$city->zip_code}}</td>
                                <td>{{$city->state}}</td>
                                <td><a href="tel:{{$city->city_team->hotline}}">{{$city->city_team->hotline}}</a>
                                </td>
                                <td>{{$city->owner->name}}
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success"
                                       href="{{route('city-teams.view', ['id' => $city->id])}}"
                                       title="Details zum Team{{$city->city_name}}">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 d-block mx-auto text-center">
                    <a href="{{route('cities.all')}}" title="Alle Städte mit Einkaufshilfen anzeigen."
                       class="btn btn-success btn-lg mx-auto">Alle Städte anzeigen</a>
                </div>
            </div>
        </section>

    @endif
    <section>
        <div class="row mt-5">
            <div class="col-lg-6 mx-auto">
                <h2 class="text-center">Helferlein für die Helfer</h2>
                <p class="text-center"><img width="50%" src="{{asset('images/einkaufswagen-helfer.svg')}}"
                                            class="img-fluid" alt="Illustration Helfer und Einkaufswagen"></p>
                <p class="text-center font-italic">Generiere deinen individuellen Abreisszettel und erhalte diesen
                    direkt in deine E-Mail Inbox. Nutze es bitte nicht, um andere E-Mail Inboxen zu belästigen.</p>
                <p>Hast du schon die Dokumentenvorlagen gesehen? Oder Das Google Spreadsheet, dass dir hilft deine
                    Einkaufshelfer und Anfragen zu koordinieren?</p>
                <p>Lese hierzu <a
                        href="https://docs.google.com/document/d/1tVk9pQzUyl6pJJ3-Ugv9Wt5N-A0IYWh6RvJ75ktcpl0/edit#heading=h.swqhexp5uwg5"
                        title="Google Spreadsheet Anleitung">die Anleitung</a> und nutze es. Wir freuen uns auf deine
                    Rückmeldung, Verbesserungsvorschläge etc. Kopiere <a
                        href="https://docs.google.com/spreadsheets/d/1TqwHgSbBtl8gAMNlaAAy7LOh4ldpv9cvDstIJ_aFYrQ/edit#gid=244255471"
                        title="Google Spreadsheet Vorlage">die Vorlage</a> und leg los!</p>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        PDF Abreisszettel
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
                                <button class="btn btn-success" type="submit" name="action" value="google_pdf_render">
                                    PDF
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
                                            <option value="{{$city->city_name}}">{{$city->city_name}}
                                                , {{$city->zip_code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-success" type="submit" name="action" value="google_pdf_render">
                                    PDF
                                    generieren
                                </button>
                            </form>
                        @endauth
                    </div>
                    <div class="card-footer text-muted">
                        Es kann 1-3 Sekunden dauern. Habe etwas Geduld. <br>
                        Der PDF-Generator läuft per Google Apps Script. Deine Daten werden hier an Google übermittelt.
                        Was die damit noch machen? 🤷
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section>
        <div class="row mt-5">
            <div class="col-lg-5 mx-auto">
                <h2 class="text-center">Die Story</h2>
                <p class="text-center">Alles begann mit dem <a href="https://wirvsvirushackathon.org/"
                                                               title="Wir versus Virus Hackathon">WirVsVirusHackathon</a>.
                    <br>Das Ergebnis seht ihr vor euren Augen.</p>
                <p class="text-center"><img src="{{asset('images/wirvsvirus-logo.svg')}}"
                                            alt="WirvsVirus Hackathon Projekt Logo" class="img-fluid"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Die Vision</h4>
                        <p class="card-text"> Wir wollen Freiwilligen dabei helfen denjenigen, die dringend auf
                            Hilfe angewiesen sind, diese auch schnellstmöglich zukommen zu lassen. Deswegen stellen
                            wir mit Einkaufshilfe ein Werkzeug zur Verfügung, mit dem sich Ehrenamtliche mit
                            mehreren Personen in ihrer Stadt, ihrem Dorf oder ihrer Kommune als
                            Einkaufshilfe-Botschafter registrieren und den gesamten Prozess einfach verwalten
                            können. Außerdem bekommen sie bei Einkaufshilfe Materialien wie Flyer und Plakate,
                            HowTo-Anleitungen und weitere Informationen an die Hand, um ihre eigene
                            Einkaufshilfe-Gruppe schnell und effektiv zu starten.</p>
                        <p class="card-text text-center">
                            <img src="{{asset('images/hand-pflanze-grafik.svg')}}" class="img-fluid"
                                 alt="Illustration Frau umarmt Oma"/>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Die Mission</h4>
                        <p class="card-text"> Da ältere Menschen, denen neben den anderen Risikogruppen vor allem
                            geholfen werden muss, häufig keinen Zugang zu den vielen digitalen Hilfsangeboten haben,
                            will Shop4Me den vielen Helfenden ein leicht zu handhabendes und vor allem übertragbares
                            Werkzeug an die Hand geben, mit dem sie selbstständig agieren und Kontakte herstellen
                            können.</p>
                        <p class="card-text">Wir bauen auf die Erfahrung von ehrenamtlichen Gruppen auf, wie sie
                            sich in den letzten Tagen vielerorts in Deutschland gegründet haben. Die Expertise einer
                            Münsteraner-Freiwilligengruppe dient Shop4Me vor allem als Fundament. Unser
                            hauptsächliches Anliegen ist es, diese Art der Freiwilligenhilfe zu vereinheitlichen und
                            dadurch ein flächendeckendes Netz zu etablieren, um möglichst viele Menschen versorgen
                            zu können.</p>
                        <p class="card-text col-lg-7 text-center">
                            <img src="{{asset('images/grossmutter-umarmen-grafik.svg')}}" class="img-fluid"
                                 alt="Illustration Frau umarmt Oma"/>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

