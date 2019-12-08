<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 * @package App\Http\Controllers
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
    public function store(Request $request)
    {
        $category = Auth::user()->categories()->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

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
    public function update(Request $request, Category $category)
    {

        //  $request->validated();
        $request->validate([
            'name' => 'min:5',
            'description' => 'min:30',
        ]);

        $category->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

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
