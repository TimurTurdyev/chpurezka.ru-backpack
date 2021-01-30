<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('setting', 'SettingCrudController');
    Route::crud('service', 'ServiceCrudController');
    Route::crud('detail', 'DetailCrudController');
    Route::crud('question', 'QuestionCrudController');
    Route::crud('review', 'ReviewCrudController');
    Route::crud('filter', 'FilterCrudController');
    Route::crud('attribute', 'AttributeCrudController');
}); // this should be the absolute last line of this file