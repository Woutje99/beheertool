<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) 
	{
		return Redirect::guest('/')->with('warning', 'U moet ingelogd zijn om deze actie uit te voeren!');
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});



Route::filter('auth.backendaccess', function()
{
    if(!Auth::guest()){
        if (!Auth::user()->roles->count() > 0)
        {
            return Redirect::to('/');
        }
    }else{
        return Redirect::to('/admin/login');
    }

});

// is the user granted to control users
Route::filter('auth.usercontrol', function(){
   $user = Auth::user();
   if(!$user->hasRole('Admin') && !$user->hasRole('Directie') ){
       return Redirect::to('/admin/dashboard')->with('warning', 'Geen toegang tot het beheren van gebruikers!'); 
   }
});

Route::filter('auth.ingredientcontrol', function(){
   $user = Auth::user();
   if(!$user->hasRole('Admin') && !$user->hasRole('Directie') ){
       return Redirect::to('/admin/dashboard')->with('warning', 'Geen toegang tot het beheren van ingredienten!'); 
   }
});

Route::filter('auth.suppliercontrol', function(){
   $user = Auth::user();
   if(!$user->hasRole('Admin') && !$user->hasRole('Directie') ){
       return Redirect::to('/admin/dashboard')->with('warning', 'Geen toegang tot het beheren van leverancieren!'); 
   }
});

Route::filter('auth.menucontrol', function(){
   $user = Auth::user();
   if(!$user->hasRole('Admin') && !$user->hasRole('Directie') ){
       return Redirect::to('/admin/dashboard')->with('warning', 'Geen toegang tot het beheren van menus!'); 
   }
});

Route::filter('auth.saleordercontrol', function(){
   $user = Auth::user();
   // alleen inkoop heeft geen toegang
   if($user->hasRole('Inkoop')){
       return Redirect::to('/admin/dashboard')->with('warning', 'Geen toegang tot het beheren van verkooporders!'); 
   }
});

Route::filter('auth.purchaseordercontrol', function(){
   $user = Auth::user();
   if(!$user->hasRole('Admin') && !$user->hasRole('Directie') && !$user->hasRole('Inkoop') && !$user->hasRole('Financhien') ){
       return Redirect::to('/admin/dashboard')->with('warning', 'Geen toegang tot het beheren van inkooporders!'); 
   }
});

Route::filter('auth.can_place_purchaseorders', function(){
   $user = Auth::user();
   if(!$user->hasRole('Admin') && !$user->hasRole('Directie') && !$user->hasRole('Inkoop') ){
       return Redirect::to('/admin/dashboard')->with('warning', 'U mag geen inkooporders toevoegen!'); 
   }
});

Route::filter('auth.isadmin', function(){
    if(!Auth::user()->hasRole('Admin')){
        return Redirect::to('/admin/dashboard')->with('warning', 'Geen toegang tot deze pagina!');
    }
});




