<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Http\Resources\TagResource;
use Exception;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $tags=Tag::get();
            return JsonResponse::respondSuccess(message:'Show',data:TagResource::collection($tags));
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
            Tag::create($request->all());
             return JsonResponse::respondSuccess(message:'Created');
            // return JsonResponse::respondSuccess(message:'Created',data:BlankResource::collection($categories));
         }catch(Exception $e)
         {
             return JsonResponse::respondError($e->getMessage());
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        try{
            return JsonResponse::respondSuccess(message:'Created',data:New TagResource($tag));
        }catch(Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        try{
            $tag->update($request->all());
            return JsonResponse::respondSuccess(message:'Updated');
        }catch(Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        try{
            $tag->delete();
            return JsonResponse::respondSuccess(message:'Deleted');
        }catch(Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}
