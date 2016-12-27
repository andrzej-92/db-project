@extends('layouts.base')

@section('content')
    <div class="full-height flex-center">
        <div>
            <h1 class="text-center">Projekt z Baz Danych 2</h1>
            <h2 class="text-center">Hurtownia Danych | Sprzedaz Biletow w Multikinie</h2>
            <h4 class="text-center">Andrzej Tracz</h4>
            <div class="container-fluid text-center">
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">Zaczynajmy &raquo;</a>
            </div>
        </div>
    </div>
@endsection