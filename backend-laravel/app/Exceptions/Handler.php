<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => trans('messages.response.error'),
                    'message' => trans('messages.response.noData'),
                ], 404);
            }
        });


        $this->renderable(function (\Spatie\Permission\Exceptions\UnauthorizedException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status'  => trans('messages.response.error'),
                    'message' => trans('messages.response.errorPermission'),
                ], 403);
            }
        });
    }

    protected function invalidJson($request, ValidationException $exception)
    {
        return response()->json([
            'title' => $exception->getMessage(),
            'message' => $exception->validator->getMessageBag()->first(),
            'errors' => $exception->errors(),
        ], $exception->status);
    }
}
