@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registriert</div>
                    <div class="card-body">
                        <h3 class="card-title">Tata! Danke!</h3>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p class="card-text">
                            Super, du bist registriert und kannst jetzt weitere Details zu deiner Stadt hinzufügen.
                        </p>
                        <a href="/" class="btn btn-success">Jetzt bearbeiten</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
