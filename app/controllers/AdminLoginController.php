<?php 

class AdminLoginController extends AdminBaseController
{
	/*
	* Titel setten van de pagina
	* View aanmaken voor de login pagina
	* Error in de content laten zien als er fout wordt ingelogd
	*/
	public function getIndex()
	{
		//die('hoi');
		$this->layout->title			=	'Inloggen - Content Management System - Scholengemeenschap de Hondsrug';
		$this->layout->content			=	View::make('admin.login');
	}

	/*
	* Input waarden ophalen uit de username en password fields
	* Controleren in de database of het bestaat
	* TRUE: Wordt je geredirect in het CMS naar het dashboard
	* FALSE: Terug gestuurd worden naar het login formulier met een foutmelding
	*/

	public function index()
	{

	// validate the info, create rules for the inputs
	$rules = array(
		'email'    => 'required|email',
		'password' => 'required'
	);


	// run the validation rules on the inputs from the form
	$validator = Validator::make(Input::all(), $rules);

	// if the validator fails, redirect back to the form
	if ($validator->fails()) 
	{
		return Redirect::to('admin')->withErrors($validator);
	} 
	else 
	{
		// create our user data for the authentication
		$credentials = array(
			'password' 	=> Input::get('password'),
			'email' 	=> Input::get('email')
		);


		// attempt to do the login
		if (Auth::attempt($credentials)) 
		{
			return Redirect::to('admin/dashboard')->with('success', 'Welkom \'' . Auth::user()->firstname . '\' in het CMS');
		}
		else
		{	 	
			// validation not successful, send back to form	with errror
			return Redirect::to('admin')->with('error', 'error');
		}
	}
}


	/*
	* Functie om in het content management systeem uit te loggen
	* Uitloggen gebeurd wanneer er op de knop uitloggen wordt gedrukt!
	*/
	public function getLogout()
	{
		Auth::logout();

		return Redirect::to('admin')->with('success', 'U bent nu uitgelogd');
	}

}





