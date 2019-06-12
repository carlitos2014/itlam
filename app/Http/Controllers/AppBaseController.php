<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    
	public function __construct($permision='', $requireAuth=true)
	{
		if($requireAuth)
			$this->middleware('auth');

		$this->middleware('permission:'.$permision.'-index',  ['only' => ['index']]);
		$this->middleware('permission:'.$permision.'-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:'.$permision.'-edit',   ['only' => ['edit', 'update']]);
		$this->middleware('permission:'.$permision.'-delete', ['only' => ['destroy']]);
	}


    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }
}
