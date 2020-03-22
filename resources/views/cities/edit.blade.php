@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <h1>{{$city->city_name}}</h1>
        <h1>{{$city->zip_code}}</h1>
        <form method="POST" action="{{route('cities.edit', ['id' => $city->id])}}">
            <input name="hotline" id="hotline" value="">
        </form>
    </div>
</div>
@endsection
