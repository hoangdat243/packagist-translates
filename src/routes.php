<?php
Route::group(['prefix' => '/{lang}'], function () {
    Route::get('lol','Vinsofts\Language\LanguageController@index');
    Route::get('create','Vinsofts\Language\LanguageController@create');
    Route::get('update','Vinsofts\Language\LanguageController@updateTrans');
    Route::post('store','Vinsofts\Language\LanguageController@store');
	
});
Route::get('testview',function(){
    return view('language::list');
});