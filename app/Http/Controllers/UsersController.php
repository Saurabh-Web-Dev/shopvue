<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = User::all();

        if($result){
            return response()->json([
                'status' => '200',
                'message' => 'Users found',
                'data' => $result
            ], 200);
        }else{
            return response()->json([
                'status' => '404',
                'message' => 'Users not found'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $resData = $request->validated();

        try{
            $result = User::insert($resData);

            if($result){
                return response()->json([
                    'status' => '201',
                    'message' => 'User created successfully'
                ], 201);
            }else{
                return response()->json([
                    'status' => '400',
                    'message' => 'User creation failed'
                ], 400);
            }

        }catch(\Exception $e){
            return response()->json([
                'status' => '409',
                'message' => 'User already exists'
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $email, string $password)
    {
        $request = User::where('email', $email)->where('password', $password)->first();

        if($request){
            return response()->json([
                'status' => '200',
                'message' => 'User found',
                'data' => $request
            ], 200);
        }else{
            return response()->json([
                'message' => 'User not found',
                'status' => '404'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = User::where('id', $id)->delete();

        if($result){
            return response()->json([
                'message' => 'User deleted successfully'
            ], 200);
        }else{
            return response()->json([
                'message' => 'User deletion failed'
            ], 400);
        }
    }
}
