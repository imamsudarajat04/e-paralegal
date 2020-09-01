<?php

use Illuminate\Http\Request;

Route::group(['prefix'=>'v0'], function() {
    Route::resource('/users/superadmin', 'Users\UserSuperAdminController', ['parameters'=>['superadmin'=>'id']]);
    //Route::resource('/users/legal', 'Users\UserLegalController', ['parameters'=>['legal'=>'id']]);
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
