@extends('layouts.base')
@section('content')
    @include('components.sidebar')
    <div class="content-wrapper popular-content">
        <div class="header">
            Zestawienie najbardziej popularnych filmów względem kategorii
        </div>

        <div class="">
            @if(isset($ranks) && count($ranks))
                @foreach($ranks as $category => $row)
                <div class="">
                    <h3>{{ $category }}</h3>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-8">
                                Film
                            </div>
                            <div class="col-xs-2">
                                Ilość biletów
                            </div>
                            <div class="col-xs-2">
                                Wartość Brutto
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach($row as $rank)
                            <div class="row">
                                <div class="col-xs-8">
                                    <span>{{ $rank->movie }}</span>
                                </div>
                                <div class="col-xs-2">
                                    <span>{{ $rank->ticket_count }}</span>
                                </div>
                                <div class="col-xs-2">
                                    <span>{{ number_format($rank->brutto_value, 2, ',', ' ') }} zł</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @endforeach
            @endif
        </div>
    </div>
@endsection