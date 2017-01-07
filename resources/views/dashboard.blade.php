@extends('layouts.base')

@section('content')
    @include('components.sidebar')
    <div class="content-wrapper">
        <div class="header">
            Zestawienie sumaryczne
        </div>
        <dashboard>
            <div class="text-center">
                <div class="loader"></div>
            </div>
        </dashboard>
    </div>
@endsection