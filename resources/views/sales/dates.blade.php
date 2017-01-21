@extends('layouts.base')

@section('content')

    @include('components.sidebar')
    <div class="content-wrapper">
        <div class="header">
            Zestawienie wg. przedziałów czasowych
        </div>

        @if (isset($sales) && count($sales))
        @else
            <h2>
                Sorry, no sales found... ;(
            </h2>
        @endif
    </div>


@endsection