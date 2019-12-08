<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskListRequest;
use App\Models\TaskList;

use Illuminate\Http\Request;

class TaskListController extends Controller
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
                'taskLists' => TaskList::all()
            ]
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaskListRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TaskListRequest $request)
    {
        $request->validated();


        $taskList = TaskList::create($request->input());


        return response()->json(
            ['data' => [
                'taskList' => $taskList
            ],
                'message' => 'success'
            ]
            ,201);
    }

    /**
     * Display the specified resource.
     *
     * @param int TaskList $taskList
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(TaskList $taskList)
    {
        return response()->json([
            'data' => [
                'taskLists' => $taskList
            ]
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskListRequest $request
     * @param int TaskList $taskList
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TaskListRequest $request, TaskList $taskList)
    {
        $request->validated();

        $taskList->update($request->input());
        return response()->json(
            ['data' => [
                'taskList' => $taskList
            ],
                'message' => 'success'
            ]
            ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int TaskList $taskList
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(TaskList $taskList)
    {

        try {
            $taskList->delete();
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error' => [
                        $e
                    ],
                    'message' => 'Ha fallado la creación de la lista de tareas'
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
