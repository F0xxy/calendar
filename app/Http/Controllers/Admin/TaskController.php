<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
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
                'tasks' => Task::all()
            ]
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaskRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TaskRequest $request)
    {
        $request->validated();


        $task = Task::create($request->input());


        return response()->json(
            ['data' => [
                'task' => $task
            ],
                'message' => 'success'
            ]
            ,201);
    }

    /**
     * Display the specified resource.
     *
     * @param int Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Task $task)
    {
        return response()->json([
            'data' => [
                'tasks' => $task
            ]
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskRequest $request
     * @param int Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TaskRequest $request, Task $task)
    {
        $request->validated();

        $task->update($request->input());
        return response()->json(
            ['data' => [
                'task' => $task
            ],
                'message' => 'success'
            ]
            ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int Task $task
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Task $task)
    {

        try {
            $task->delete();
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error' => [
                        $e
                    ],
                    'message' => 'Ha fallado la creación de la tarea'
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
