@extends('layouts.base')
@section('content')
    @include('components.sidebar')
    <div class="content-wrapper">
        <div class="header">
            Zestawienie wg. przedziałów czasowych
        </div>
        <dates></dates>
        @if(isset($ranks) && count($ranks))
            @foreach($ranks as $year => $row)
                <div class="">
                    <h3>{{ $year }}</h3>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-8">
                                Miesiąc
                            </div>
                            <div class="col-xs-2">
                                Wartość brutto
                            </div>
                            <div class="col-xs-2">
                                Podsumowanie
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach($row as $rank)
                            <div class="row">
                                <div class="col-xs-8">
                                    <span>{{ month_name($rank->month) }}</span>
                                </div>
                                <div class="col-xs-2">
                                    <span>{{ number_format($rank->brutto_value, 2, ',', ' ') }}</span>
                                </div>
                                <div class="col-xs-2">
                                    <span>{{ number_format($rank->brutto_value_saldo, 2, ',', ' ') }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection