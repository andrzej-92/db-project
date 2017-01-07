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
}