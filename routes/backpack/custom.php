<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'auth')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { 
    // custom admin routes
    CRUD::resource('article', 'ArticleCrudController');
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('tag', 'TagCrudController');
    CRUD::resource('menu-item', 'MenuItemCrudController');
    CRUD::resource('athlete', 'AthleteCrudController');
}); // this should be the absolute last line of this file

