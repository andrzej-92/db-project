@extends('layouts.base')

@section('content')
    @include('components.sidebar')
    <div class="content-wrapper types-content">
        <div class="header">
            Zestawienie wg. typów
        </div>
        {{--Types Vue.js component --}}
        <types></types>


        @if($category_type && count($category_type))
            @foreach($category_type as $typeName => $type)

                <div class="">
                    <h2>{{ $typeName == 'ALL' ? 'Wszystkie typy' : $typeName }}</h2>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                Kategoria
                            </div>
                            <div class="col-xs-3">
                                Ilość sprzedazy
                            </div>
                            <div class="col-xs-3">
                                Wartość sprzedazy
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach($type as $categoryName => $category)
                            @continue($categoryName == 'ALL')
                            <div class="row">
                                <div class="col-xs-6">
                                    {{ $categoryName }}
                                </div>
                                <div class="col-xs-3">
                                    {{ $category->count  }}
                                </div>
                                <div class="col-xs-3">
                                    {{ number_format($category->brutto_value, 2, '.', ' ')  }} zł
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection