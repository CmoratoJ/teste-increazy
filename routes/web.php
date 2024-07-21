<?php

use App\Http\Controllers\CepController;
use Illuminate\Support\Facades\Route;

Route::resource('/search/local/{ceps}', CepController::class);