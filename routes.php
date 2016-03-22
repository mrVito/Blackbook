<?php

Route::get('/', 'index@FrontController');
Route::get('api/index', 'index@APIController');
Route::post('api/hate/{id}', 'hate@APIController');
Route::post('api/unhate/{id}', 'unhate@APIController');