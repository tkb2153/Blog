<?php

Route::group(['middleware' => 'web', 'prefix' => 'blog', 'namespace' => 'Modules\Blog\Http\Controllers'], function()
{
    Route::get('/deposit/', 'BlogController@deposit');
    Route::get('/member/', 'BlogController@member');
});

// Menu::make('FunpodiumMenu', function($menu){

//   	$menu->add('module2', 'ss');
//   // $menu->add('module', ['url' => 'members', 'secure' => true]);
// 	$menu->add('module',    ['route'  => 'test.2']);
// 	$menu->module->add('Who We are', 'who-we-are');
// 	$menu->get('module')->add('What We Do', 'what-we-do');


// 	// $about = $menu->add('About',    ['route'  => 'test.2', 'class' => 'navbar navbar-about dropdown']);

// 	// $about->link->attr(['class' => 'dropdown-toggle', 'data-toggle' => 'dropdown']);
// 	$menu->add('Articles', 'articles')->active('this-is-another-url/*');

// 	$menu->group(['prefix' => 'nicktest1'], function($m){

// 		$m->add('Who we are?', 'who-we-are');   // URL: about/who-we-are
// 		$m->add('What we do?', 'what-we-do');   // URL: about/what-we-do

// 	});

// });