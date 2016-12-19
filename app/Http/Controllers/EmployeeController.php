<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{
    protected $employers;

    public function __construct(EmployeeRepository $employers)
    {
            $this->employers = $employers;
    }

    public function index()
    {
        $employers = $this->employers->getAllEmployees();

       return view('employers', compact('employers'));
    }
}
