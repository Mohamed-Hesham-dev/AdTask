<?php

namespace App\Helpers;


class JsonResponse
{
    const MSG_NOT_ALLOWED = 'NOT_ALLOWED';
    const MSG_NOT_FOUND = 'NOT_FOUND';
    const MSG_NOT_AUTHORIZED = 'NOT_AUTHORIZED';
    const MSG_NOT_AUTHENTICATED = 'NOT_AUTHENTICATED';

    public static function respondError($message, $status = 500)
    {
       // $message = is_string($message) ? [$message] : $message;
        return response()->json([
            'status' => $status,
            'message' => $message ?? "Error" ,
        ], $status);
    }


    public static function respondSuccess( $message, $status = 200, $data = null, $meta = null, $links = null,$token=null)
    {
        $message = $message;
        return response()->json([
            'status' => $status ,
            'token'=>$token,
            'message' => $message ,
            'data' => $data,
            'meta' => $meta ,
            'links' => $links
        ], $status);
    }
}
