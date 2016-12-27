<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabaseSchema extends Migration
{
    protected $moviesCategoryTable = 'movies_category';
    protected $moviesTable = 'movies';
    protected $showingTypesTable = 'showing_types';
    protected $showingsTable = 'showings';
    protected $invoicesTable = 'invoices';
    protected $paymentTypesTable = 'payment_types';
    protected $statesTable = 'states';
    protected $citiesTable = 'cities';
    protected $cinemasTable = 'cinemas';
    protected $yearsTable = 'years';
    protected $monthsTable = 'months';
    protected $daysTable = 'days';
    protected $salesTable = 'sales';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            $this->createMovieCategories();
            $this->createMovies();
            $this->createShowingsTypes();
            $this->createShowings();
            $this->createPaymentType();
            $this->createInvoices();
            $this->createStates();
            $this->createCities();
            $this->createCinemas();
            $this->createYears();
            $this->createMonths();
            $this->createDays();
            $this->createSales();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            $this->dropSales();
            $this->dropDays();
            $this->dropMonths();
            $this->dropYears();
            $this->dropCinemas();
            $this->dropCities();
            $this->dropStates();
            $this->dropInvoices();
            $this->dropPaymentType();
            $this->dropShowingsTypes();
            $this->dropShowings();
            $this->dropMovies();
            $this->dropMovieCategories();
    }

    private function createMovieCategories()
    {
        Schema::create($this->moviesCategoryTable, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
    }

    private function dropMovieCategories()
    {
        Schema::dropIfExists($this->moviesCategoryTable);
    }

    private function createMovies()
    {
        Schema::create($this->moviesTable, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->string('name');

            $table->foreign('category_id')->references('id')->on($this->moviesCategoryTable);
        });
    }

    private function dropMovies()
    {
        Schema::dropIfExists($this->moviesTable);
    }

    private function createShowingsTypes()
    {
        Schema::create($this->showingTypesTable, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
    }

    private function dropShowingsTypes()
    {
        Schema::dropIfExists($this->showingTypesTable);
    }

    private function createShowings()
    {
        Schema::create($this->showingsTable, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('movie_id');
            $table->timestamp('start_at');
            $table->unsignedInteger('room_number');

            $table->foreign('type_id')->references('id')->on($this->showingTypesTable);
            $table->foreign('movie_id')->references('id')->on($this->moviesTable);
        });
    }

    private function dropShowings()
    {
        Schema::dropIfExists($this->showingsTable);
    }

    private function createInvoices()
    {
        Schema::create($this->invoicesTable, function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->float('amount');
        });
    }

    private function dropInvoices()
    {
        Schema::dropIfExists($this->invoicesTable);
    }

    private function createStates()
    {
        Schema::create($this->statesTable, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
    }

    private function dropStates()
    {
        Schema::dropIfExists($this->statesTable);
    }

    private function createCities()
    {
        Schema::create($this->citiesTable, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('state_id');
            $table->string('name');

            $table->foreign('state_id')->references('id')->on($this->statesTable);
        });
    }

    private function dropCities()
    {
        Schema::dropIfExists($this->citiesTable);
    }

    private function createCinemas()
    {
        Schema::create($this->cinemasTable, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('state_id');
            $table->string('name');

            $table->foreign('state_id')->references('id')->on($this->statesTable);
        });
    }

    private function dropCinemas()
    {
        Schema::dropIfExists($this->cinemasTable);
    }

    private function createPaymentType()
    {
        Schema::create($this->paymentTypesTable, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
    }

    private function dropPaymentType()
    {
        Schema::dropIfExists($this->paymentTypesTable);
    }

    private function createYears()
    {
        Schema::create($this->yearsTable, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
    }

    private function dropYears()
    {
        Schema::dropIfExists($this->yearsTable);
    }

    private function createMonths()
    {
        Schema::create($this->monthsTable, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('year_id');
            $table->string('name');

            $table->foreign('year_id')->references('id')->on($this->yearsTable);
        });
    }

    private function dropMonths()
    {
        Schema::dropIfExists($this->monthsTable);
    }

    private function createDays()
    {
        Schema::create($this->daysTable, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('month_id');
            $table->string('name');

            $table->foreign('month_id')->references('id')->on($this->monthsTable);
        });
    }

    private function dropDays()
    {
        Schema::dropIfExists($this->daysTable);
    }

    private function createSales()
    {
        Schema::create($this->salesTable, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('showing_id');
            $table->unsignedInteger('invoice_id');
            $table->unsignedInteger('day_id');
            $table->unsignedInteger('cinema_id');
            $table->unsignedInteger('payment_type_id');

            $table->float('netto_price');
            $table->float('brutto_price');
            $table->unsignedInteger('ticket_count');

            $table->foreign('showing_id')->references('id')->on($this->showingsTable);
            $table->foreign('invoice_id')->references('id')->on($this->invoicesTable);
            $table->foreign('day_id')->references('id')->on($this->daysTable);
            $table->foreign('cinema_id')->references('id')->on($this->cinemasTable);
            $table->foreign('payment_type_id')->references('id')->on($this->paymentTypesTable);
        });
    }

    private function dropSales()
    {
        Schema::dropIfExists($this->salesTable);
    }
}
