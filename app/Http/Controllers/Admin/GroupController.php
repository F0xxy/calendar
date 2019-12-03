<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
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
                'groups' => Group::all()
            ]
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GroupRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(GroupRequest $request)
    {
        $request->validated();


        $group = Group::create($request->input());


        return response()->json(
            ['data' => [
                'group' => $group
            ],
                'message' => 'success'
            ]
            ,201);
    }

    /**
     * Display the specified resource.
     *
     * @param int Group $group
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Group $group)
    {
        return response()->json([
            'data' => [
                'groups' => $group
            ]
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GroupRequest $request
     * @param int Group $group
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(GroupRequest $request, Group $group)
    {
        $request->validated();

        $group->update($request->input());
        return response()->json(
            ['data' => [
                'group' => $group
            ],
                'message' => 'success'
            ]
            ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int Group $group
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Group $group)
    {

        try {
            $group->delete();
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error' => [
                        $e
                    ],
                    'message' => 'Ha fallado la creación del grupo'
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
