<?php

namespace App\Traits;

trait JsonResponses
{
    protected function ok($message)
    {
        return $this->success($message, 200);
    }

    protected function success($message, $statusCode = 200)
    {
        return response()->json([
            'message' => $message,
            'status' => $statusCode
        ], $statusCode);
    }

    protected function error($message, $statusCode = 422)
    {
        return $this->response($message, $statusCode);
    }

    protected function response($message, $statusCode = 422)
    {
        return response()->json([
            'message' => $message,
            'status' => $statusCode
        ], $statusCode);
    }
    protected function responseWithData($message, $data,  $statusCode = 422)
    {
        return response()->json([
            'message' => $message,
            'status' => $statusCode,
            $data
        ], $statusCode, );
    }
}

