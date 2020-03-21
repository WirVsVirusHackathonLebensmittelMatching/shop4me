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
                           class="form-control form-control-lg" name="zip_code" id="zip_code" aria-describedby="helpId"
                           placeholder="PLZ">
                    <small id="helpId" class="form-text text-muted">Gebe deine PLZ ein</small>
                </div>
                <input name="" id="" class="btn btn-primary" type="submit" value="Einkaufshelfer-Team gründen">
            </form>
        </div>

    </div>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Warum</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Warum</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Warum</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
@endsection
