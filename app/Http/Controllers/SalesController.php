<?php

namespace App\Http\Controllers;

use App\Repositories\SalesRepository;

class SalesController extends Controller
{
    protected $salesRepository;

    public function __construct(SalesRepository $salesRepository)
    {
        $this->salesRepository = $salesRepository;
    }

    public function index()
    {
        return view('sales.all');
    }

    public function types()
    {
        $sales = $this->salesRepository->getSalesRollUpByShowingType();
        $eachSales = $this->salesRepository->getSalesRollUpByShowingTypeForEachCinema();
        $cinemas = [];

        foreach ($eachSales as $cinemaSale)
        {
            $cinemas[$cinemaSale->cinema][$cinemaSale->showing_type]['netto'] =
                number_format($cinemaSale->netto, 2, '.', ' ');
            $cinemas[$cinemaSale->cinema][$cinemaSale->showing_type]['brutto'] =
                number_format($cinemaSale->brutto, 2, '.', ' ');
            $cinemas[$cinemaSale->cinema][$cinemaSale->showing_type]['count'] = $cinemaSale->count;
        }

        $categoryTypesDate = [];
        $categoryAndTypes = $this->salesRepository->getSalesCountCubeShowingTypeAndMovieCategory();

        foreach ($categoryAndTypes as $type) {
            $categoryTypesDate[$type->type][$type->category] = (object) [
                'count' => $type->count,
                'brutto_value' => $type->brutto_value,
            ];
        }


        return view('sales.types', [
            'sales' => $sales,
            'eachSales' => $eachSales,
            'cinemas' => $cinemas,
            'category_type' => $categoryTypesDate
        ]);
    }

    public function dates()
    {
        $salesData = $this->salesRepository
            ->getSalesValuesWithSummaryForEachMonth()
            ->groupBy('year');

        return view('sales.dates')->withRanks($salesData);
    }

    public function places()
    {
        $categoriesByStatesData = [];
        $categoriesByStates = $this->salesRepository->getSalesCountGroupingByStateAndMovieCategory();

        foreach ($categoriesByStates as $row) {
            $categoriesByStatesData[$row->state][$row->category] = (object) [
                'count' => $row->count,
                'brutto_value' => $row->brutto,
            ];
        }

        return view('sales.places', [
            'states_categories' => $categoriesByStatesData
        ]);
    }

    public function popular()
    {
        $ranks = $this->salesRepository->getMoviesRankForEachState();
        $data = [];

        foreach ($ranks as $rank) {
            $data[$rank->category][] = (object) [
                'movie' => $rank->movie,
                'ticket_count' => $rank->ticket_count,
                'brutto_value' => $rank->brutto_value,
            ];
        }

        return view('sales.popular')->withRanks($data);
    }


    public function category()
    {
        $dataSets = $this->salesRepository->getSalesMoviesCategoryForEachCinema();
        $categoryData =  $dataSets->groupBy('cinema');

        return view('sales.category')->withRanks($categoryData);
    }

    public function payments()
    {
        $payments = $this->salesRepository->getSalesPaymentTypesForEachCinema();
        $paymentsData = $payments->groupBy('cinema');

        return view('sales.payments')->withRanks($paymentsData);
    }
}
