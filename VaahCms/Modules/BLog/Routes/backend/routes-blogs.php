<?php

Route::group(
    [
        'prefix' => 'backend/blog/blogs',

        'middleware' => ['web', 'has.backend.access'],

        'namespace' => 'Backend',
],
function () {
    /**
     * Get Assets
     */
    Route::get('/assets', 'BlogsController@getAssets')
        ->name('vh.backend.blog.blogs.assets');
    /**
     * Get List
     */
    Route::get('/', 'BlogsController@getList')
        ->name('vh.backend.blog.blogs.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', 'BlogsController@updateList')
        ->name('vh.backend.blog.blogs.list.update');
    /**
     * Delete List
     */
    Route::delete('/', 'BlogsController@deleteList')
        ->name('vh.backend.blog.blogs.list.delete');


    /**
     * Create Item
     */
    Route::post('/', 'BlogsController@createItem')
        ->name('vh.backend.blog.blogs.create');
    /**
     * Get Item
     */
    Route::get('/{id}', 'BlogsController@getItem')
        ->name('vh.backend.blog.blogs.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', 'BlogsController@updateItem')
        ->name('vh.backend.blog.blogs.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', 'BlogsController@deleteItem')
        ->name('vh.backend.blog.blogs.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', 'BlogsController@listAction')
        ->name('vh.backend.blog.blogs.list.actions');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', 'BlogsController@itemAction')
        ->name('vh.backend.blog.blogs.item.action');

    //---------------------------------------------------------

    /**
     * Item actions with taxonomies
     */
    Route::post('/status/{blogId}', 'BlogsController@changeTagStatus')
        ->name('vh.backend.blog.blogs.item.action.changetagstatus');

    //---------------------------------------------------------

    /**
     * Image Upload
     */
    Route::post('/image/upload', 'BlogsController@imageUpload')
        ->name('vh.backend.blog.blogs.item.action.imageupload');

    //---------------------------------------------------------

});
