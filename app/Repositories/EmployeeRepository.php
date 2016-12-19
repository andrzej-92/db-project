<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository
{

    public function getAllEmployees()
    {
        return Employee::hydrateRaw("select id, imie, nazwisko, pesel from pracownik");
    }
}