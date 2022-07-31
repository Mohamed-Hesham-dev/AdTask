<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Http\Resources\CategoryResource;
use App\Models\Ad;
use Carbon\Carbon;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $categories=Category::get();
            return JsonResponse::respondSuccess(message:'Show',data:CategoryResource::collection($categories));
        }catch(Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            Category::create($request->all());
             return JsonResponse::respondSuccess(message:'Created');
         }catch(Exception $e)
         {
             return JsonResponse::respondError($e->getMessage());
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        try{
             return JsonResponse::respondSuccess(message:'Show',data:New CategoryResource($category));
         }catch(Exception $e)
         {
             return JsonResponse::respondError($e->getMessage());
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try{
            $category->update($request->all());
            return JsonResponse::respondSuccess(message:'Updated');
        }catch(Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try{
            $category->delete();
            return JsonResponse::respondSuccess(message:'Deleted');
        }catch(Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}
