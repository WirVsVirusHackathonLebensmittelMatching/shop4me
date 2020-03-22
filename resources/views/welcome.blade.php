@extends('layouts.app')
@section('content')
    <section>
    <div class="row mb-5">
        <div class="col-lg-6 mx-auto">
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
                        <strong> Du hast bereits eine Stadt für dein Team registriert. Aktuell kannst du nur eine
                            Stadt unterstützen. Wir schätzen deine Ambitionen ;). Fühle dich gedrückt und bleibe gesund.
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
                    <a href="#" class="btn btn-success">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12  mb-2">
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
        <div class="col-lg-4 col-sm-12">
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
    </section>
    @guest
        @if($cities->count() > 0)
            <section>
                <div class="row mt-5">
                    <div class="col table-responsive-lg">
                        <h3 class="text-center mb-5">Folgende Städte werden von Einkaufshelfern unterstützt.️</h3>
                        <table class="table table-striped">
                            <thead class="thead-light">
                            <tr>
                                <th>Stadt/Stadteil</th>
                                <th>PLZ</th>
                                <th>Bundesland</th>
                                <th>Hotline</th>
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
            </section>

        @endif
        <section>
            <div class="row mt-5">
                <div class="col-lg-5 mx-auto">
                    <h2 class="text-center">Die Story</h2>
                    <p class="text-center">Alles begann mit dem <a href="https://wirvsvirushackathon.org/"
                                                                   title="Wir versus Virus Hackathon">WirVsVirusHackathon</a>.
                        <br>Das Ergebnis seht ihr vor euren Augen.</p>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endguest
@endsection

