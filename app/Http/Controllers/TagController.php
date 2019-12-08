<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;

use Illuminate\Http\Request;

class TagController extends Controller
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
                'tags' => Tag::all()
            ]
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TagRequest $request)
    {
        $request->validated();


        $tag = Tag::create($request->input());


        return response()->json(
            ['data' => [
                'tag' => $tag
            ],
                'message' => 'success'
            ]
            ,201);
    }

    /**
     * Display the specified resource.
     *
     * @param int Tag $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Tag $tag)
    {
        return response()->json([
            'data' => [
                'tags' => $tag
            ]
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TagRequest $request
     * @param int Tag $tag
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $request->validated();

        $tag->update($request->input());
        return response()->json(
            ['data' => [
                'tag' => $tag
            ],
                'message' => 'success'
            ]
            ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int Tag $tag
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {

        try {
            $tag->delete();
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error' => [
                        $e
                    ],
                    'message' => 'Ha fallado la creación de la etiqueta'
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
