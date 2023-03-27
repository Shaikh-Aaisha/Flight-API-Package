<?php
namespace Flight\Aerodatabox\Controllers\api;
use Flight\Aerodatabox\Services\AeroDataBoxService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class FlightController
{
    public function flight(Request $req)
    {
        $data = $req->only('searchby','parameter');
        $validator = Validator::make($data, [
            'searchby'   => 'required|string',//any no or string according to parameter
            'parameter' => 'required'//it should be a number,reg,callsign or icao24
            
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status'    => 'failed',
                    'errors'    =>  $validator->errors(),
                    'message'   =>  trans('validation.custom.input.invalid'),
                ],
                400
            );
        } 
        else
        {
            try
            {
                //Service class
                $AeroDataBoxService = new AeroDataBoxService;
                $searchby = $req->searchby;
                $parameter = $req->parameter;
                $flight_info = $AeroDataBoxService->getNearestFlight($searchby,$parameter);
                if($flight_info == null)
                {
                    return response()->json([
                        'status'  => 'failed',
                        'message' => trans('validation.custom.invalid.request'),
                    ],400);
                }
                else
                {
                    return response()->json([
                        'status'  => 'success',
                        'message' => trans('validation.custom.valid.request'),
                        'flight-info' => json_decode($flight_info)
                    ],200);
                }
            
            }
            catch (\Throwable $e)
            {
                return response()->json([
                    'status'  => 'failed',
                    'message' => trans('validation.custom.invalid.request'),
                    'error'   => $e->getMessage()
                ],500);
            }
        }

    }
}