<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reservation;
use Exception;
use App\User;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = [
                "code" => 200,
                "status" => "OK",
                "message" => "success",
                "response" => [],
            ];
            
            $reservations = Reservation::all();
            $response['response'] = $reservations;

        } catch(Exception $e) {
            $response = [
                "code"=>400,
                "status" => "Bad",
                "message" => "error",
                "response" => [
                    "errorCode" => 400,
                    "errorMessage" => $e->getMessage()
                ]
            ];
        }

        return response()->json($response, $response['code']);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try { 
            $response = [
                "code" => 200,
                "status" => "OK",
                "message" => "success",
                "response" => true
            ];
            
            $user = User::findOrFail($request->host);

            if(!$user->is_host) {
                throw new Exception("Unabled to create reservation, user is not host");
            }
            if(count($request->guests) < 1) {
                throw new Exception("Unabled to create reservation without guests");
            }    
                
            $reservation = Reservation::create(['user_id' => $request->host]);
            $reservation->guests()->attach($request->guests);
            
        } catch(Exception $e) {
            $response = [
                "code"=>400,
                "status" => "Bad",
                "message" => "error",
                "response" => [
                    "errorCode" => 400,
                    "errorMessage" => $e->getMessage()
                ]
            ];
        }

        return response()->json($response, $response['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $response = [
                "code" => 200,
                "status" => "OK",
                "message" => "success",
                "response" => [],
            ];
            
            $guests = [];
            $user = User::findOrFail($id);

            if($user->reservations->count() < 1) {
                throw new Exception("Unabled to find reservations for the user");
            }
            
            foreach($user->reservations as $reservation) {
                foreach($reservation->guests as $guest){
                    $guests[] = $guest;        
                }
            }
            $response['response'] = $guests;

        } catch(Exception $e) {
            $response = [
                "code"=>400,
                "status" => "Bad",
                "message" => "error",
                "response" => [
                    "errorCode" => 400,
                    "errorMessage" => $e->getMessage()
                ]
            ];
        }

        return response()->json($response, $response['code']);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try { 
            $response = [
                "code" => 200,
                "status" => "OK",
                "message" => "success",
                "response" => true
            ];
            
            $user = User::findOrFail($id);
            $user->reservation->update($request->all());
        
        } catch(Exception $e) {
            $response = [
                "code"=>400,
                "status" => "Bad",
                "message" => "error",
                "response" => [
                    "errorCode" => 400,
                    "errorMessage" => $e->getMessage()
                ]
            ];
        }
        
        return response()->json($response, $response['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try { 
            $response = [
                "code" => 200,
                "status" => "OK",
                "message" => "success",
                "response" => true
            ];
            
            $user = User::findOrFail($id);
            
            if($user->reservations->count() < 1) {
                throw new Exception("Unabled to delete reservations, user do not have reservations");
            }
            
            foreach($user->reservations as $reservation) {
                $reservation->delete();
            }
        } catch(Exception $e) {
            $response = [
                "code"=>400,
                "status" => "Bad",
                "message" => "error",
                "response" => [
                    "errorCode" => 400,
                    "errorMessage" => $e->getMessage()
                ]
            ];
        }

        return response()->json($response, $response['code']);
    }

}
