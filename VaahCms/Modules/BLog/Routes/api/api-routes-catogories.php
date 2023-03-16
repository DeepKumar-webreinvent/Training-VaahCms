<?php

/*
 * API url will be: <base-url>/public/api/blog/catogories
 */
Route::group(
    [
        'prefix' => 'blog/catogories',
        'namespace' => 'Backend',
    ],
function () {

    /**
     * Get Assets
     */
    Route::get('/assets', 'CatogoriesController@getAssets')
        ->name('vh.backend.blog.api.catogories.assets');
    /**
     * Get List
     */
    Route::get('/', 'CatogoriesController@getList')
        ->name('vh.backend.blog.api.catogories.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', 'CatogoriesController@updateList')
        ->name('vh.backend.blog.api.catogories.list.update');
    /**
     * Delete List
     */
    Route::delete('/', 'CatogoriesController@deleteList')
        ->name('vh.backend.blog.api.catogories.list.delete');


    /**
     * Create Item
     */
    Route::post('/', 'CatogoriesController@createItem')
        ->name('vh.backend.blog.api.catogories.create');
    /**
     * Get Item
     */
    Route::get('/{id}', 'CatogoriesController@getItem')
        ->name('vh.backend.blog.api.catogories.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', 'CatogoriesController@updateItem')
        ->name('vh.backend.blog.api.catogories.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', 'CatogoriesController@deleteItem')
        ->name('vh.backend.blog.api.catogories.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', 'CatogoriesController@listAction')
        ->name('vh.backend.blog.api.catogories.list.action');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', 'CatogoriesController@itemAction')
        ->name('vh.backend.blog.api.catogories.item.action');



});
