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


}
