<?php
Route::group(['prefix' => '/{lang}'], function () {
    Route::get('lol','Datht\Language\LanguageController@index');
    Route::get('create','Datht\Language\LanguageController@create');
    Route::get('update','Datht\Language\LanguageController@updateTrans');
    Route::post('store','Datht\Language\LanguageController@store');
	
});
Route::get('testview',function(){
    return view('language::list');
});