## Steps for Installing Flight-API-Package

### About 
"Laravel": "^0.9",
"guzzlehttp/guzzle": "^7.2",
"php": "^8.0"

#### Steps

---php
Route::post('/flights-status-nearest',[FlightController::class,'flight']);//nearest flight
Route::post('/flights-status-byDate',[FlightController::class,'flightbyDate']);//nearest flight by date
Route::post('/flights-status-bydepartureDate',[FlightController::class,'flightdeparturedate']);//flight departure with date
Route::post('/delaybyflightno',[FlightController::class,'delaybyflightno']);//flight delay by flight number
Route::post('/AirportDepArr',[FlightController::class,'AirportDepArr']);//flight arrival and departure schedule
