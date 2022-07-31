<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use Exception;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Http\Resources\AdResource;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
           $ads =  Ad::Query();

           if (request('cat_id')) {
            $ads->where('category_id',$request->cat_id);
           }
           if(request('tag_id')){
                $ads->whereHas('tags',function ($q)
                {
                    $q->where('tag_id',request('tag_id'));
                });
           }
           $ads=$ads->get();
 
             return JsonResponse::respondSuccess(message:'Created',data:AdResource::collection($ads));
            // return JsonResponse::respondSuccess(message:'Created',data:BlankResource::collection($categories));
         }catch(Exception $e)
         {
             return JsonResponse::respondError($e->getMessage());
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
    }
}
