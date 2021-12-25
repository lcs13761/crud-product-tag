<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group(['prefix' => '/','middleware' => Source\Support\MiddlewareAuth::class,'namespace' => 'admin'], function () {

      SimpleRouter::get("/ajax" ,'DashBoardController@ajax')->name('dash.ajax');
      SimpleRouter::get('/','DashBoardController@index')->name('dash.index');

      SimpleRouter::group(['prefix' => '/product'],function(){
          SimpleRouter::get('/','ProductController@index')->name('product.index');
          SimpleRouter::get('/create','ProductController@create')->name('product.create');
          SimpleRouter::post('/store','ProductController@store')->name('product.store');
          SimpleRouter::get('/edit/{id}','ProductController@edit')->name('product.edit')->where(['id' => '[0-9]+']);
          SimpleRouter::put('/update/{id}','ProductController@update')->name('product.update')->where(['id' => '[0-9]+']);
          SimpleRouter::delete('/destroy/{id}','ProductController@destroy')->name('product.destroy')->where(['id' => '[0-9]+']);
      });

      SimpleRouter::group(['prefix' => '/tag'],function(){
          SimpleRouter::get('/','TagController@index')->name('tag.index');
          SimpleRouter::get('/{id}','TagController@show')->name('tag.show')->where(['id' => '[0-9]+']);
          SimpleRouter::get('/create','TagController@create')->name('tag.create');
          SimpleRouter::post('/store','TagController@store')->name('tag.store');
          SimpleRouter::get('/edit/{id}','TagController@edit')->name('tag.edit')->where(['id' => '[0-9]+']);
          SimpleRouter::put('/update/{id}','TagController@update')->name('tag.update')->where(['id' => '[0-9]+']);
          SimpleRouter::delete('/destroy/{id}','TagController@destroy')->name('tag.destroy')->where(['id' => '[0-9]+']);
      });
});
