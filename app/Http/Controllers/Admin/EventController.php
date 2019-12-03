<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;

class EventController extends Controller
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
                'events' => Event::all()
            ]
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EventRequest $request)
    {
        $request->validated();


        $event = Event::create($request->input());


        return response()->json(
            ['data' => [
                'event' => $event
            ],
                'message' => 'success'
            ]
            ,201);
    }

    /**
     * Display the specified resource.
     *
     * @param int Event $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Event $event)
    {
        return response()->json([
            'data' => [
                'events' => $event
            ]
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param int Event $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EventRequest $request, Event $event)
    {
        $request->validated();

        $event->update($request->input());
        return response()->json(
            ['data' => [
                'event' => $event
            ],
                'message' => 'success'
            ]
            ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int Event $event
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Event $event)
    {

        try {
            $event->delete();
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error' => [
                        $e
                    ],
                    'message' => 'Ha fallado la creación de la evento o cita'
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
