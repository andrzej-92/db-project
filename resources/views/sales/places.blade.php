@extends('layouts.base')

@section('content')
    @include('components.sidebar')
    <div class="content-wrapper">
        <div class="header">
            Zestawienie wg. miejsc zakupu
        </div>

        @if (isset($sales) && count($sales))
            @foreach($sales as  $key => $sale)
                <div class="employee-box">
                    <span>
                        {{ $key + 1 }}
                    </span>
                    <span>
                        {{ $sale->city }}
                    </span>
                    <span>
                        {{ $sale->netto }}
                    </span>
                    <span>
                        {{ $sale->brutto }}
                    </span>
                </div>
            @endforeach
        @else
            <h2>
                Sorry, no sales found... ;(
            </h2>
        @endif
    </div>
@endsection