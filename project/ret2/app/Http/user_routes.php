<?php
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::pattern('id', '[0-9]+');
    Route::pattern('id2', '[0-9]+');

    #Inicio
    Route::get('dashboard', 'User\DashboardController@index');

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
    Route::post('perfil', 'User\UserProfile@postEdit');
    Route::get('perfil', 'User\UserProfile@show');
    Route::get('perfil/password', 'User\UserProfile@getPassword');
    Route::post('perfil/password', 'User\UserProfile@postPassword');
    Route::get('perfil/imagen', 'User\UserProfile@getImagen');
    Route::post('perfil/imagen', 'User\UserProfile@postImagen');
    Route::get('perfil/baja', 'User\UserProfile@getBaja');
    Route::post('perfil/baja', 'User\UserProfile@postBaja');

    #Subasta
    Route::get('subastas','User\SubastaController@index'); // <---- CAMBIAR RUTA EN LA FUNCIÓN!!!!!
    Route::get('subastas/data', 'User\SubastaController@data');
    Route::get('subastas/reorder', 'User\SubastaController@getReorder');
    Route::get('subasta/create', 'User\SubastaController@getCreate');
    Route::post('subasta/create', 'User\SubastaController@postCreate');
    Route::get('subasta/{id}','User\SubastaController@viewSubasta'); //id en la function del controller
    #Sub Prorroga
    Route::get('subasta/{id}/prorrogar','User\SubastaController@getProrrogar'); //id en la function del controller
    Route::post('subasta/{id}/prorrogar','User\SubastaController@postProrrogar'); //Falta implementarlo
    #Sub Cerrar
    Route::get('subasta/{id}/cerrar','User\SubastaController@getCerrar'); //id en la function del controller
    Route::post('subasta/{id}/cerrar', 'User\SubastaController@postCerrar'); //Implementar
    Route::get('subasta/ganadas','User\SubastaController@getGanadas');
    Route::get('subastas/data2', 'User\SubastaController@data2');
    Route::get('subasta/finalizadas','User\SubastaController@getFinalizadas');
    Route::get('subastas/data3', 'User\SubastaController@data3');

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

    #eval
    Route::get('rating/{id}','User\EvalUserController@show');

});
