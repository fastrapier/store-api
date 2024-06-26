<?php

namespace App\Exceptions;

use Arr;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Request;
use TypeError;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*') && $e->getPrevious() instanceof ModelNotFoundException) {
                $e = $e->getPrevious();
                return response()->json([
                    'success' => false,
                    'message' => Arr::last(explode('\\', $e->getModel())) . ' with id: ' . implode(',', $e->getids()) . ' not found',
                    'code' => 400
                ], 400);
            }
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'code' => 500
            ], 500);
        });

        $this->renderable(function (TypeError $e, Request $request) {
            return response()->json([
                'success' => false,
                'message' => "Id in path not found",
                'code' => 400
            ], 400);
        });

        $this->renderable(function (AuthenticationException $exception, Request $request) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 401);
        });

//        $this->renderable(function (Exception $e, Request $request) {
//            return response()->json([
//                'success' => false,
//                'exception' => $e::class,
//                'message' => $e->getMessage(),
//                'code' => 500
//            ], 500);
//        });
    }
}
