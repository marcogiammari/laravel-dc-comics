<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $links = config('store.links');
    $cards = config('comics');
    $features = config('store.features');
    $footerCols = config('store.footerCols');
    $footerSocialMedias = config('store.footerSocialMedias');
    return view('home', compact('links', 'cards', 'features', 'footerCols', 'footerSocialMedias'));
});

Route::get('/single/{param}', function ($param) {
    $links = config('store.links');
    $cards = config('comics');
    $features = config('store.features');
    $footerCols = config('store.footerCols');
    $footerSocialMedias = config('store.footerSocialMedias');
    return view('single', compact('param', 'links', 'cards', 'features', 'footerCols', 'footerSocialMedias'));
});
