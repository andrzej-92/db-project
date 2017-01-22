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
            $cinemas[$cinemaSale->cinema][$cinemaSale->showing_type]['netto'] = $cinemaSale->netto;
            $cinemas[$cinemaSale->cinema][$cinemaSale->showing_type]['brutto'] = $cinemaSale->brutto;
            $cinemas[$cinemaSale->cinema][$cinemaSale->showing_type]['count'] = $cinemaSale->count;
        }

        return view('sales.types', [
            'sales' => $sales,
            'eachSales' => $eachSales,
            'cinemas' => $cinemas,
        ]);
    }

    public function dates()
    {
        return view('sales.dates');
    }

    public function places()
    {
        return view('sales.places');
    }


}
