<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Admin
 */
class CategoryController extends Controller
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
                'categories' => Category::all()
            ]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CategoryRequest $request)
    {
        $request->validated();


        $category = Category::create($request->input());


        return response()->json(
            ['data' => [
                'category' => $category
            ],
                'message' => 'success'
            ]
            , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $category)
    {
        return response()->json([
            'data' => [
                'category' => $category
            ]
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param int Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $request->validated();

        $category->update($request->input());
        return response()->json(
            ['data' => [
                'category' => $category
            ],
                'message' => 'success'
            ]
            , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int Category $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error' => [
                        $e
                    ],
                    'message' => 'Ha fallado la creación de la categoría'
                ]
                , 400);
        }
        return response()->json(
            [
                'message' => 'success'
            ]
            , 204);
    }
}
