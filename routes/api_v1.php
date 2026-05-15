<?php

use App\Http\Controllers\Api\V1\TicketController;
use Illuminate\Support\Facades\Route;

// auth:sanctum middleware
Route::apiResource('tickets', TicketController::class);
