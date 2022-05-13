<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class GeneralJsonException extends Exception
{
    // 
    /**
     * Report the exception. 
     * 
     * @return void
     */
    public function report()
    {
    }

    // 
    /**
     * Render exception as an HTTP  response
     * 
     * @return \Illuminate\Http\Request $request
     */
    public function render($request)
    {
        return new JsonResponse([
            'errors' => [
                // $this : refer to the current object, and since Exception class extends from BaseHttpException, so $this possibly refer to ....
                'message' => $this->getMessage(),
            ]
        ], $this->code);
    }
}
