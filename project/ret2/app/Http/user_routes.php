<?php
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::pattern('id', '[0-9]+');
    Route::pattern('id2', '[0-9]+');

    #Admin Dashboard
    Route::get('dashboard', 'User\DashboardController@index');

    #Language
    Route::get('language', 'User\LanguageController@index');
    Route::get('language/create', 'User\LanguageController@getCreate');
    Route::post('language/create', 'User\LanguageController@postCreate');
    Route::get('language/{id}/edit', 'User\LanguageController@getEdit');
    Route::post('language/{id}/edit', 'User\LanguageController@postEdit');
    Route::get('language/{id}/delete', 'User\LanguageController@getDelete');
    Route::post('language/{id}/delete', 'User\LanguageController@postDelete');
    Route::get('language/data', 'User\LanguageController@data');
    Route::get('language/reorder', 'User\LanguageController@getReorder');

    #News category
    Route::get('newscategory', 'User\ArticleCategoriesController@index');
    Route::get('newscategory/create', 'User\ArticleCategoriesController@getCreate');
    Route::post('newscategory/create', 'User\ArticleCategoriesController@postCreate');
    Route::get('newscategory/{id}/edit', 'User\ArticleCategoriesController@getEdit');
    Route::post('newscategory/{id}/edit', 'User\ArticleCategoriesController@postEdit');
    Route::get('newscategory/{id}/delete', 'User\ArticleCategoriesController@getDelete');
    Route::post('newscategory/{id}/delete', 'User\ArticleCategoriesController@postDelete');
    Route::get('newscategory/data', 'User\ArticleCategoriesController@data');
    Route::get('newscategory/reorder', 'User\ArticleCategoriesController@getReorder');

    #News
    Route::get('news', 'User\ArticlesController@index');
    Route::get('news/create', 'User\ArticlesController@getCreate');
    Route::post('news/create', 'User\ArticlesController@postCreate');
    Route::get('news/{id}/edit', 'User\ArticlesController@getEdit');
    Route::post('news/{id}/edit', 'User\ArticlesController@postEdit');
    Route::get('news/{id}/delete', 'User\ArticlesController@getDelete');
    Route::post('news/{id}/delete', 'User\ArticlesController@postDelete');
    Route::get('news/data', 'User\ArticlesController@data');
    Route::get('news/reorder', 'User\ArticlesController@getReorder');

    #Photo Album
    Route::get('photoalbum', 'User\PhotoAlbumController@index');
    Route::get('photoalbum/create', 'User\PhotoAlbumController@getCreate');
    Route::post('photoalbum/create', 'User\PhotoAlbumController@postCreate');
    Route::get('photoalbum/{id}/edit', 'User\PhotoAlbumController@getEdit');
    Route::post('photoalbum/{id}/edit', 'User\PhotoAlbumController@postEdit');
    Route::get('photoalbum/{id}/delete', 'UserUser\PhotoAlbumController@getDelete');
    Route::post('photoalbum/{id}/delete', 'User\PhotoAlbumController@postDelete');
    Route::get('photoalbum/data', 'User\PhotoAlbumController@data');
    Route::get('photoalbum/reorder', 'User\PhotoAlbumController@getReorder');

    #Photo
    Route::get('photo', 'User\PhotoController@index');
    Route::get('photo/create', 'User\PhotoController@getCreate');
    Route::post('photo/create', 'User\PhotoController@postCreate');
    Route::get('photo/{id}/edit', 'User\PhotoController@getEdit');
    Route::post('photo/{id}/edit', 'User\PhotoController@postEdit');
    Route::get('photo/{id}/delete', 'User\PhotoController@getDelete');
    Route::post('photo/{id}/delete', 'User\PhotoController@postDelete');
    Route::get('photo/{id}/itemsforalbum', 'User\PhotoController@itemsForAlbum');
    Route::get('photo/{id}/{id2}/slider', 'User\PhotoController@getSlider');
    Route::get('photo/{id}/{id2}/albumcover', 'User\PhotoController@getAlbumCover');
    Route::get('photo/data/{id}', 'User\PhotoController@data');
    Route::get('photo/reorder', 'User\PhotoController@getReorder');

    #Video
    Route::get('videoalbum', 'User\VideoAlbumController@index');
    Route::get('videoalbum/create', 'User\VideoAlbumController@getCreate');
    Route::post('videoalbum/create', 'User\VideoAlbumController@postCreate');
    Route::get('videoalbum/{id}/edit', 'User\VideoAlbumController@getEdit');
    Route::post('videoalbum/{id}/edit', 'User\VideoAlbumController@postEdit');
    Route::get('videoalbum/{id}/delete', 'User\VideoAlbumController@getDelete');
    Route::post('videoalbum/{id}/delete', 'User\VideoAlbumController@postDelete');
    Route::get('videoalbum/data', 'User\VideoAlbumController@data');
    Route::get('video/reorder', 'User\VideoAlbumController@getReorder');

    #Video
    Route::get('video', 'User\VideoController@index');
    Route::get('video/create', 'User\VideoController@getCreate');
    Route::post('video/create', 'User\VideoController@postCreate');
    Route::get('video/{id}/edit', 'UserUser\VideoController@getEdit');
    Route::post('video/{id}/edit', 'User\VideoController@postEdit');
    Route::get('video/{id}/delete', 'User\VideoController@getDelete');
    Route::post('video/{id}/delete', 'User\VideoController@postDelete');
    Route::get('video/{id}/itemsforalbum', 'User\VideoController@itemsForAlbum');
    Route::get('video/{id}/{id2}/albumcover', 'User\VideoController@getAlbumCover');
    Route::get('video/data/{id}', 'User\VideoController@data');
    Route::get('video/reorder', 'User\VideoController@getReorder');

    #Users
    Route::get('users/', 'User\UserController@index');
    Route::get('users/create', 'User\UserController@getCreate');
    Route::post('users/create', 'User\UserController@postCreate');
    Route::get('users/{id}/edit', 'User\UserController@getEdit');
    Route::post('users/{id}/edit', 'User\UserController@postEdit');
    Route::get('users/{id}/delete', 'User\UserController@getDelete');
    Route::post('users/{id}/delete', 'User\UserController@postDelete');
    Route::get('users/data', 'User\UserController@data');

    #Cosas añadidas
    //Falta un controller general para el usuario
    Route::get('perfil/modificar','ModifyProfile@show');
    Route::get('perfil', 'UserProfile@show');
    
    //Route::get('crear/subasta','Subasta'); --> No está implementado aún el controller. Falta uno general de subasta

});
