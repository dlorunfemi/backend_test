<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($items = null, $status = 200)
    {
        $res = [
            'status_code'   => $status,
            'status'        => 'success',
        ];

        $items = ($items instanceof Arrayable) ? $items->toArray() : $items;

        if ($items) {
            foreach ($items as $key => $item) {
                $res[$key] = $item;
            }
        }

        return response()->json($res, $status)->setEncodingOptions(JSON_NUMERIC_CHECK);
    }

    public function error($items = null, $statusCode = 422, $statusMsg = 'Something went wrong')
    {
        $res = [
            'status_code'   => $statusCode,
            'status'        => $statusMsg,
        ];

        if ($items) {
            foreach ($items as $key => $item) {
                $res[$key] = $item;
            }
        }

        return response()->json($res, $statusCode)->setEncodingOptions(JSON_NUMERIC_CHECK);

    }
}
