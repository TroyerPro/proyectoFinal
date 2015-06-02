<?php
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::pattern('id', '[0-9]+');
    Route::pattern('id2', '[0-9]+');

    #Admin Dashboard
    Route::get('dashboard', 'Admin\DashboardController@index');

    #Language
    Route::get('language', 'Admin\LanguageController@index');
    Route::get('language/create', 'Admin\LanguageController@getCreate');
    Route::post('language/create', 'Admin\LanguageController@postCreate');
    Route::get('language/{id}/edit', 'Admin\LanguageController@getEdit');
    Route::post('language/{id}/edit', 'Admin\LanguageController@postEdit');
    Route::get('language/{id}/delete', 'Admin\LanguageController@getDelete');
    Route::post('language/{id}/delete', 'Admin\LanguageController@postDelete');
    Route::get('language/data', 'Admin\LanguageController@data');
    Route::get('language/reorder', 'Admin\LanguageController@getReorder');

    #Categories
    Route::get('newscategory', 'Admin\CategoriasController@index');
    Route::get('newscategory/create', 'Admin\CategoriasController@getCreate');
    Route::post('newscategory/create', 'Admin\CategoriasController@postCreate');
    Route::get('newscategory/{id}/edit', 'Admin\CategoriasController@getEdit');
    Route::post('newscategory/{id}/edit', 'Admin\CategoriasController@postEdit');
    Route::get('newscategory/{id}/delete', 'Admin\CategoriasController@getDelete');
    Route::post('newscategory/{id}/delete', 'Admin\CategoriasController@postDelete');
    Route::get('newscategory/data', 'Admin\CategoriasController@data');
    Route::get('newscategory/reorder', 'Admin\CategoriasController@getReorder');

    #Users
    Route::get('users/', 'Admin\UserController@index');
    Route::get('users/create', 'Admin\UserController@getCreate');
    Route::post('users/create', 'Admin\UserController@postCreate');
    Route::get('users/{id}/edit', 'Admin\UserController@getEdit');
    Route::post('users/{id}/edit', 'Admin\UserController@postEdit');
    Route::get('users/{id}/delete', 'Admin\UserController@getDelete');
    Route::post('users/{id}/delete', 'Admin\UserController@postDelete');
    Route::get('users/data', 'Admin\UserController@data');

    #Cosas añadidas
    Route::get('crear/categoria', 'CategoriasController@show');
    Route::post('crear/categoria', 'CategoriasController@create');
    Route::get('site/config', 'Admin\SiteConfig@show'); //Hecho
    Route::post('site/config', 'Admin\SiteConfig@postEdit'); //Hecho
    Route::get('estadisticas/users','ViewStats@statsUser');
    Route::post('estadisticas/users','ViewStats@postStatsUser');
    Route::get('estadisticas/categorias','ViewStats@statsCategorias');
    Route::post('estadisticas/categorias','ViewStats@postStatsCategorias');
    Route::get('factura','GenerateFactura@show');
    Route::get('estadisticas','ViewStats@show');
    //Route::get('factura','GenerateFactura@show');

    #Subastas
    Route::get('subastas','Admin\SubastaController@show');
    Route::get('subasta/finalizadas','Admin\SubastaController@getFinalizadas');
    Route::get('subastas/data/','Admin\SubastaController@data');
    Route::get('subastas/data2/','Admin\SubastaController@data2');

    #Factura
    Route::get('factura/{id}','Admin\SubastaController@factura');
    Route::post('factura/xml','Admin\FacturaController@generateXml');
    Route::post('factura/pdf','Admin\FacturaController@generatePdf');

});
