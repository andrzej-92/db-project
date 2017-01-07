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
        $sales = $this->salesRepository->getAllSales();

        return view('sales.types', compact('sales'));
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
