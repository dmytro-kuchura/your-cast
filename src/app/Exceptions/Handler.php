<?php

namespace App\Exceptions;

use App\Helpers\LoggerHelper;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
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
        $this->reportable(function (Throwable $throwable) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($request->wantsJson()) {
            return $this->handleApiException($request, $e);
        }
        LoggerHelper::error('Handle render exception', [$e->getMessage()]);
        return parent::render($request, $e);
    }

    private function handleApiException($request, Throwable $exception)
    {
        $exception = $this->prepareException($exception);
        if ($exception instanceof AuthenticationException) {
            $exception = $this->unauthenticated($request, $exception);
        }
        if ($exception instanceof ValidationException) {
            $exception = $this->convertValidationExceptionToResponse($exception, $request);
        }
        return $this->customApiResponse($exception);
    }

    private function customApiResponse($exception)
    {
        if (method_exists($exception, 'getStatusCode')) {
            $statusCode = $exception->getStatusCode();
        } else {
            $statusCode = 500;
        }
        $response = [];
        switch ($statusCode) {
            case Response::HTTP_UNAUTHORIZED:
                $response['message'] = 'Unauthorized';
                break;
            case Response::HTTP_FORBIDDEN:
                $response['message'] = 'Forbidden';
                break;
            case Response::HTTP_NOT_FOUND:
                $response['message'] = 'Not Found';
                break;
            case Response::HTTP_METHOD_NOT_ALLOWED:
                $response['message'] = 'Method Not Allowed';
                break;
            case Response::HTTP_UNPROCESSABLE_ENTITY:
                $response['message'] = $exception->original['message'];
                $response['errors'] = $exception->original['errors'];
                break;
            default:
                $response['message'] = ($statusCode == 500) ? 'Whoops, looks like something went wrong' : $exception->getMessage();
                break;
        }
        if (config('app.debug')) {
            $response['trace'] = $exception->getTrace();
            $response['code'] = $exception->getCode();
        }
        $response['status'] = $statusCode;
        LoggerHelper::error('Handle Api exception', $response);
        return response()->json($response, $statusCode);
    }
}
