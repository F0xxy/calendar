<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;


/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => [
                'users' => User::all()
            ]
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request)
    {
        $request->validated();
        $user = User::create($request->input());
        return response()->json(
            ['data' => [
                'user' => $user
            ],
                'message' => 'success'
            ]
        ,201);
    }

    /**
     * Display the specified resource.
     *
     * @param int User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return response()->json([
            'data' => [
                'users' => $user
            ]
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $request->validated();

        $user->update($request->input());
        return response()->json(
            ['data' => [
                'user' => $user
            ],
                'message' => 'success'
            ]
        ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {

        try {
            $user->delete();
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error' => [
                        $e
                    ],
                    'message' => 'fail'
                ]
            ,400);
        }
        return response()->json(
            [
                'message' => 'success'
            ]
      ,204);
    }
}
