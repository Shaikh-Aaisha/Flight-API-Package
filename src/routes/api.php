<?php 
use Illuminate\Support\Facades\Route;
use Flight\Aerodatabox\Controllers\api\FlightController;
 

Route::post('/flights-status-nearest',[FlightController::class,'flight']);//nearest flight













?>