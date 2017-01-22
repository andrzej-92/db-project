<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SalesRepository;

class SalesController
{
    protected $salesRepository;

    public function __construct(SalesRepository $salesRepository)
    {
        $this->salesRepository = $salesRepository;
    }

    public function index()
    {
        $sales = $this->salesRepository->getSalesRollUpByCity();

        $labels = [];
        $netto = [
            'label' => 'Wartość Netto'
        ];
        $brutto = [
            'label' => 'Wartość Brutto'
        ];
        $count = [
            'label' => 'Ilość Sprzedaży'
        ];

        if (! empty($sales)) {
            foreach($sales as $sale) {
                if ($sale->city == 'ALL') {
                    continue;
                }
                $labels[] = $sale->city;
                $netto['data'][] = $sale->netto;
                $brutto['data'][] = $sale->brutto;
                $count['data'][] = $sale->count;
            }
        }

        return [
            'sales_value' => [
                'labels' => $labels,
                'datasets' => [$brutto]
            ],
            'sales_count' => [
                'labels' => $labels,
                'datasets' => [$count]
            ],
        ];
    }

    public function allTypes()
    {
        $all = $this->salesRepository->getSalesRollUpByShowingType();
        $eachSales = $this->salesRepository->getSalesRollUpByShowingTypeForEachCinema();
        $cinemas = [];
        $labels = [];
        $counts = [];

        foreach ($all as $item) {

            if ($item->showing_type == 'ALL') {
                continue;
            }

            $labels[] = $item->showing_type;
            $counts['data'][] = $item->count;
        }

        foreach ($eachSales as $cinemaSale) {
            if ($cinemaSale->cinema == 'ALL') {
                continue;
            }

            $cinemas[$cinemaSale->cinema][$cinemaSale->showing_type]['netto'] = $cinemaSale->netto;
            $cinemas[$cinemaSale->cinema][$cinemaSale->showing_type]['brutto'] = $cinemaSale->brutto;
            $cinemas[$cinemaSale->cinema][$cinemaSale->showing_type]['count'] = $cinemaSale->count;
        }

        $cinemasCollection = collect($cinemas);

        $cinemasCollection = $cinemasCollection->sortByDesc(function ($cinema) {
            return $cinema['ALL']['brutto'];
        });

        return [
            'all' => [
                'labels' => $labels,
                'datasets' => [$counts]
            ],
            'cinemas' => $cinemasCollection
        ];
    }

    public function allByDates()
    {
        $sales = $this->salesRepository->getSalesRollUpDate();
        $data = [];
        $labels = [];

        foreach ($sales as $sale) {
            $data[$sale->year][$sale->month] = [
                'netto' => (float) $sale->netto,
                'brutto' => (float) $sale->brutto,
                'ticket_count' => (int)  $sale->ticket_count,
                'count' => (int) $sale->count
            ];

            $labels[$sale->year][] = "{$sale->month}";
        }

        return [
            'all' => [
                'labels' => $labels,
                'years' => $data
            ],
        ];
    }
}