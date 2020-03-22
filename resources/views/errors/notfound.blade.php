@extends('layouts.app')

@section('content')
    <div class="alert alert-danger" role="alert">
        <strong>Keine Stadt zu der Postleitzahl {{$zip_code}} gefunden</strong>
    </div>
    <a class="btn btn-lg btn-success" href="{{url()->previous()}}">Zurück</a>
@endsection
