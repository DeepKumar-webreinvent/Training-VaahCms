<?php

/*
 * API url will be: <base-url>/public/api/blog/blogs
 */
Route::group(
    [
        'prefix' => 'blog/blogs',
        'namespace' => 'Backend',
    ],
function () {

    /**
     * Get Assets
     */
    Route::get('/assets', 'BlogsController@getAssets')
        ->name('vh.backend.blog.api.blogs.assets');
    /**
     * Get List
     */
    Route::get('/', 'BlogsController@getList')
        ->name('vh.backend.blog.api.blogs.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', 'BlogsController@updateList')
        ->name('vh.backend.blog.api.blogs.list.update');
    /**
     * Delete List
     */
    Route::delete('/', 'BlogsController@deleteList')
        ->name('vh.backend.blog.api.blogs.list.delete');


    /**
     * Create Item
     */
    Route::post('/', 'BlogsController@createItem')
        ->name('vh.backend.blog.api.blogs.create');
    /**
     * Get Item
     */
    Route::get('/{id}', 'BlogsController@getItem')
        ->name('vh.backend.blog.api.blogs.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', 'BlogsController@updateItem')
        ->name('vh.backend.blog.api.blogs.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', 'BlogsController@deleteItem')
        ->name('vh.backend.blog.api.blogs.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', 'BlogsController@listAction')
        ->name('vh.backend.blog.api.blogs.list.action');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', 'BlogsController@itemAction')
        ->name('vh.backend.blog.api.blogs.item.action');



});
