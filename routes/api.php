<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\UserController;
use App\Models\SmsLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return okResponse('Welcome to API');
});
Route::post('sms-log', function (Request $request) {
    SmsLog::create([
        'data' => json_encode($request->all()),
        'action' => SmsLog::ACTION_CHECK,
    ]);
});
Route::prefix('auth')->group(function () {
    Route::post('/sign-up', [AuthController::class, 'register']);
    Route::post('/confirm', [AuthController::class, 'confirm']);
    Route::post('/create-password', [AuthController::class, 'createPassword']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/resend-code', [AuthController::class, 'resendCode']);
});
Route::prefix('countries')->group(function () {
    Route::get('/', [CountryController::class, 'index']);
});

// Routes with auth:api and scope:organization middleware
Route::middleware(['auth:api', 'scope:' . User::ROLE_ORGANIZATION])->group(function () {
    Route::prefix('organizations')->group(function () {
        Route::get('/my-organization', [OrganizationController::class, 'myOrganization']);
        Route::put('/{organization}', [OrganizationController::class, 'update'])->whereNumber('organization');
        Route::post('/details', [OrganizationController::class, 'details']);
        Route::get('/branches', [OrganizationController::class, 'branches']);
        Route::post('/branches', [OrganizationController::class, 'storeBranch']);
        Route::put('/branches/{organization}', [OrganizationController::class, 'updateBranch'])->whereNumber('organization');
        Route::delete('/branches/{organization}', [OrganizationController::class, 'destroyBranch'])->whereNumber('organization');
    });
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'adminIndex']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::get('/{category:slug}', [CategoryController::class, 'show']);
        Route::put('/{category:slug}', [CategoryController::class, 'update']);
        Route::delete('/{category:slug}', [CategoryController::class, 'destroy']);
    });
    Route::prefix('genres')->group(function () {
        Route::get('/', [CategoryController::class, 'adminIndexGenre']);
        Route::post('/', [CategoryController::class, 'storeGenre']);
        Route::get('/{category:slug}', [CategoryController::class, 'show']);
        Route::put('/{category:slug}', [CategoryController::class, 'update']);
        Route::delete('/{category:slug}', [CategoryController::class, 'destroy']);
    });
});

// Routes with auth:api middleware
Route::middleware(['auth:api'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/profile', [UserController::class, 'profile']);
    });
    Route::post('/organizations', [OrganizationController::class, 'store']);
});

// Routes without middleware
Route::prefix('organizations')->group(function () {
    Route::get('/', [OrganizationController::class, 'index']);
    Route::get('/{organization:slug}', [OrganizationController::class, 'show']);
});
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{category:slug}', [CategoryController::class, 'show']);
});
