@extends('layouts.base')

@section('content')
    @include('components.sidebar')
    <div class="content-wrapper">
        <div class="header">
            Zestawienie wg. miejsc zakupu
        </div>
        @if (isset($states_categories) && count($states_categories))
            @foreach($states_categories as  $state => $category)
                <div class="">
                    <h3>{{ $state }}</h3>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-8">
                                Kategoria
                            </div>
                            <div class="col-xs-2">
                                Ilość sprzedaży
                            </div>
                            <div class="col-xs-2">
                                Wartość Brutto
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach($category as $categoryName => $row)
                            @continue($categoryName == 'ALL')
                            <div class="row">
                                <div class="col-xs-8">
                                    <span>{{ $categoryName  }}</span>
                                </div>
                                <div class="col-xs-2">
                                    <span>{{ $row->count }}</span>
                                </div>
                                <div class="col-xs-2">
                                    <span>{{ number_format($row->brutto_value, 2, ',', ' ') }} zł</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="panel-footer">
                        <div class="row font-bolder">
                            @php($row = $category['ALL'])
                            <div class="col-xs-8">
                                <span>W sumie</span>
                            </div>
                            <div class="col-xs-2">
                                <span>{{ $row->count }}</span>
                            </div>
                            <div class="col-xs-2">
                                <span>{{ number_format($row->brutto_value, 2, ',', ' ') }} zł</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection