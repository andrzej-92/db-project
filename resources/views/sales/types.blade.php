@extends('layouts.base')

@section('content')
    @include('components.sidebar')
    <div class="content-wrapper">
        <div class="header">
            Zestawienie wg. typów
        </div>
        {{--Types Vue.js component --}}
        <types></types>
    </div>
@endsection