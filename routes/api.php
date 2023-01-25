<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return ['version' => 'foo'];
})->middleware(['throttle:unauthenticated'])
->withoutMiddleware(['throttle:api']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'prefix' => '/uzer',
], function(){

    // create user
    Route::controller(\App\Http\Controllers\User::class)->group(function(){
        Route::middleware(['throttle:unauthenticated'])
            ->withoutMiddleware(['throttle:api'])->group(function(){

            Route::put('/register', 'register');

            Route::post('/login', 'login');
        });
    });

    // update user (auth protected)
    Route::patch('/me', function(){
        return ['blaha'];
    });

    // get "my" user info (auth protected)
    Route::get('/me', function(){
        return ['blahs'];
    });


    Route::put('', function(){
        return [__FILE__.':'.__LINE__];
    });

    // load specific user (auth protected)
    Route::get('/id/{id}', function(){
        return [__FILE__.':'.__LINE__];
    });

    // update specific user (auth protected)
    Route::patch('{id}', function(){
        return [__FILE__.':'.__LINE__];
    });

    // delete specific user (auth protected)
    Route::delete('{id}', function(){
        return [__FILE__.':'.__LINE__];
    });

    Route::group([
        'prefix' => 'token'
    ], function(){
        
        // create a new token (captcha?)
        Route::put('', function(){
            return ['aaa'];
        });
    });


    Route::group([
        'prefix' => 'password'
    ], function(){
        // request reset (captcha)
        Route::post('/request-reset', function(){
            return ['foo'];
        });

        // validate reset token (captcha)
        Route::post('/request-validate', function(){
            return ['aaa'];
        });

        // confirm reset (captcha + token)
        Route::post('', function(){
            return ['aaa'];
        });

        // update password (auth protected)
        Route::patch('', function(){
            return ['aaaaaa'];
        });
    });

    Route::group([
        'prefix' => 'mfa'
    ], function(){
        // TODO
    });
    
});

// load all users (auth protected)
Route::get('uzers', function(){
    return ['blahe'];
});