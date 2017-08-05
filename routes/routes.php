<?php

Route::group(['middleware' => 'auth'], function () {

});

Route::group(['middleware' => 'api', 'prefix' => 'api'], function () {

});
