<?php
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::pattern('id', '[0-9]+');
    Route::pattern('id2', '[0-9]+');

    #Admin Dashboard
    Route::get('dashboard', 'User\DashboardController@index');


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



    #Cosas añadidas
    //Falta un controller general para el usuario
    Route::post('perfil', 'User\UserProfile@postEdit');
    Route::get('perfil', 'User\UserProfile@show');
    Route::get('perfil/password', 'User\UserProfile@getPassword');
    Route::post('perfil/password', 'User\UserProfile@postPassword');
    Route::get('perfil/imagen', 'User\UserProfile@getImagen');
    Route::post('perfil/imagen', 'User\UserProfile@postImagen');
    #Subasta
    Route::get('subastas','User\SubastaController@index'); // <---- CAMBIAR RUTA EN LA FUNCIÓN!!!!!
    Route::get('subastas/data', 'User\SubastaController@data');
    Route::get('subastas/reorder', 'User\SubastaController@getReorder');
    Route::get('subasta/create', 'User\SubastaController@getCreate');
    Route::post('subasta/create', 'User\SubastaController@postCreate');
    Route::get('subasta/{id}','User\SubastaController@viewSubasta'); //id en la function del controller
    Route::get('subasta/{id}/prorrogar','User\SubastaController@getProrrogar'); //id en la function del controller
    Route::post('subasta/{id}/prorrogar','User\SubastaController@postProrrogar'); //Falta implementarlo
    Route::get('subasta/{id}/cerrar','User\SubastaController@getCerrar'); //id en la function del controller
    Route::post('subasta/{id}/cerrar', 'User\SubastaController@postCerrar'); //Implementar
    Route::get('subasta/ganadas','User\SubastaController@getGanadas');
    Route::get('subastas/data2', 'User\SubastaController@data2');

    #Pujas
    Route::get('pujas','User\PujasController@index');
    Route::get('pujas/data', 'User\PujasController@data');
    Route::get('pujas/create/{id}','User\PujasController@getCreate');
    Route::post('pujas/create/{id}','User\PujasController@postCreate');

    #Chat
    Route::get('chat','User\ChatController@show');
    Route::post('chat','User\ChatController@send');
    Route::get('chat/{id}','User\ChatController@getChat');
    Route::get('chat/{id}/abrir','User\ChatController@abrirChat');
    Route::get('chat/ajax/{id}','User\ChatController@getChatAJAX');
    Route::post('chat/ajax/{id}','User\ChatController@postChatAJAX');
    Route::get('chat/data', 'User\ChatController@data');
});
