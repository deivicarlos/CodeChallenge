<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Exception;


class UserController extends Controller
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
            
            $users = User::all();
            $response['response'] = $users;

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
        return view('users.index', compact('users')); 
        //response()->json($response, $response['code']);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try { 
            $response = [
                "code" => 200,
                "status" => "OK",
                "message" => "success",
                "response" => true
            ];
            
            User::create($request->all());
        
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

    public function show($id) {
        try { 
            $response = [
                "code" => 200,
                "status" => "OK",
                "message" => "success",
                "response" => [
                    'reservation_id' => []
                ]
            ];
            
            $user = User::select(
                'id',
                'first_name', 
                'last_name',
                'name',
                'email', 
                'date_of_birth',
                'is_host',
                'latitude',
                'longitude',
                'created_at', 
                'updated_at'
                )->findOrFail($id);
            
            $user->reservation_id;
            $response['response'] = $user;
            
        } catch(Exception $e) {
            $response = [
                "code"=>400,
                "status" => "BadRequest",
                "message" => "error",
                "response" => [
                    "errorCode" => 404,
                    "errorMessage" => "Record not found"
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
            
            $user->update($request->all());

        
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
    public function destroy($id)
    {
        try { 
            $response = [
                "code" => 200,
                "status" => "OK",
                "message" => "success",
                "response" => true
            ];
            
            $user = User::findOrFail($id);
            $user->delete();
            
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
     * Searches for guests users in a 50m radio from the received user id
     *
     * @param  int  $id
     * @return array(int) 
     */
    public function recommendations($id) {
        try{
            $response = [
                "code" => 200,
                "status" => "OK",
                "message" => "success",
                "response" => [
                    'uids' => []
                ]
            ];
            
            $ids = [];
            $host = User::findOrFail($id);
            
            User::where('id', '!=', $id)
                    ->chunk(200, function ($users) use ($host, &$ids) {
                        foreach($users as $guest) {
                            if(distance($host->latitude, $host->longitude, $guest->latitude, $guest->longitude)) {
                                $ids[] = $guest->id;
                            }
                        }
                    });
            
            $response['response']['uids'] = $ids;
        
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
