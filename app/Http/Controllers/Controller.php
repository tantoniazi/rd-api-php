<?php

namespace App\Http\Controllers;

use App\Utils\ResponseUtil;
use Illuminate\Support\Facades\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 *
 * @OA\Info(
 *      version="1.0.0",
 *      title="PROVA RD",
 *      description="PROVA RD",
 *      @OA\Contact(
 *          email="tiago.antoniazi@gmail.com"
 *      )
 * )
 */
/**
 *
 *  @OA\Server(
 *      url="http://api.local:8181",
 *      description="development"
 * )
 */

class Controller extends BaseController
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json($message, 200);
    }
}
