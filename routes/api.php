<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


/*
Api REST Users
*/
/*Route::resource('ApiGetAllUsers', 'ApiRestUsersAllController')->parameters([
    'ApiGetAllUsers' => 'letraSearch'
]);*/

Route::resources([
    'ApiGetAllUsers' => 'API\ApiRestUsersAll',
    'posts' => 'API\ApiRestUsersAll'
]);

Route::resources([
    'ApiGetUsersDependence' => 'API\ApiRestUsersDependence',
    'posts' => 'API\ApiRestUsersDependence'
]);

Route::resources([
    'ApiGetAllDependence' => 'API\ApiRestAllDependence',
    'posts' => 'API\ApiRestAllDependence'
]);

Route::resources([
    'ApiRestSeguimientoAll' => 'API\ApiRestSeguimientoAll',
    'posts' => 'API\ApiRestSeguimientoAll'
]);
