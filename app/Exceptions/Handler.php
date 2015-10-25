<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
    ];

    public function report(Exception $e)
    {
        return parent::report($e);
    }

    public function render($request, Exception $e)
    {
        if($e instanceof NullException){
            return response()->view('errors.null', ['errors' => $e->getError()]);
        }
        if($e instanceof PermissionException){
            return response()->view('errors.authorize', ['errors' => $e->getError()]);
        }
        return parent::render($request, $e);
    }
}
