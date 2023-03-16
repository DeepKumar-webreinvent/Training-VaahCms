<?php

Route::group(
    [
        'prefix' => 'backend/blog/catogories',
        
        'middleware' => ['web', 'has.backend.access'],
        
        'namespace' => 'Backend',
],
function () {
    /**
     * Get Assets
     */
    Route::get('/assets', 'CatogoriesController@getAssets')
        ->name('vh.backend.blog.catogories.assets');
    /**
     * Get List
     */
    Route::get('/', 'CatogoriesController@getList')
        ->name('vh.backend.blog.catogories.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', 'CatogoriesController@updateList')
        ->name('vh.backend.blog.catogories.list.update');
    /**
     * Delete List
     */
    Route::delete('/', 'CatogoriesController@deleteList')
        ->name('vh.backend.blog.catogories.list.delete');


    /**
     * Create Item
     */
    Route::post('/', 'CatogoriesController@createItem')
        ->name('vh.backend.blog.catogories.create');
    /**
     * Get Item
     */
    Route::get('/{id}', 'CatogoriesController@getItem')
        ->name('vh.backend.blog.catogories.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', 'CatogoriesController@updateItem')
        ->name('vh.backend.blog.catogories.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', 'CatogoriesController@deleteItem')
        ->name('vh.backend.blog.catogories.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', 'CatogoriesController@listAction')
        ->name('vh.backend.blog.catogories.list.actions');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', 'CatogoriesController@itemAction')
        ->name('vh.backend.blog.catogories.item.action');

    //---------------------------------------------------------

});
