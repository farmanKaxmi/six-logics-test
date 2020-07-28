<?php

namespace App\Traits;


trait ApiHelper
{
    public function success($code, $data, $message = false)
    {
        $result = [
            'status' => true,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($result, $code);
    }

    public function error($code, $data=false, $message = false)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'error' => $data
        ], $code);
    }

}
