@extends('layouts.base')

@section('content')
    @include('components.sidebar')
    <div class="content-wrapper">
        <div class="header">
            Zestawienie wg. typów seansów
        </div>
        <types></types>
    </div>
@endsection