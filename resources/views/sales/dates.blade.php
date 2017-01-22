@extends('layouts.base')

@section('content')

    @include('components.sidebar')
    <div class="content-wrapper">
        <div class="header">
            Zestawienie wg. przedziałów czasowych
        </div>
        <dates></dates>
    </div>
@endsection