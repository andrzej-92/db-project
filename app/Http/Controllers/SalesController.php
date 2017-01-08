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
        $sales = $this->salesRepository->getAllSales();

        return view('sales.all', compact('sales'));
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
        $sales = $this->salesRepository->getAllSales();

        return view('sales.dates', compact('sales'));
    }

    public function places()
    {
        $sales = $this->salesRepository->getSalesRollUpByCity();

        return view('sales.places', compact('sales'));
    }


}
