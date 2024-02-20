<?php

namespace App\Exceptions;

use App\Http\Services\LogService;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Laravel\Passport\Exceptions\MissingScopeException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
        $this->reportable(function (Throwable $e) {
            if ($e instanceof \Exception || $e instanceof \Error){
                LogService::sendLog(request(), $e->getMessage(), $e->getFile(), $e->getLine());
            }

            if ($e instanceof MissingScopeException){
                return forbiddenRequestResponse("You don't have permission to access this resource.");
            }
        });
    }
}
