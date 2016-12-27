@extends('layouts.base')

@section('content')
    @if (isset($sales) && count($sales))
        @foreach($sales as $sale)
            <div class="employee-box">
                    <span>
                        {{ $employee->netto_price }}
                    </span>
                    <span>
                        {{ $employee->brutton_price }}
                    </span>
            </div>
        @endforeach
    @else
        <h2>
            Sorry, no sales found... ;(
        </h2>
    @endif
@endsection