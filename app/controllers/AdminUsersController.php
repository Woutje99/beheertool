<?php 

class AdminUsersController extends AdminBaseController
{

	// Laat alle gebruikers zien in een tabel
	public function getIndex()
	{
		$this->layout->title				=	'Gebruikers overzicht';
		$this->layout->content->title		= 	'Gebruikers overzicht';
		$this->layout->content->content		=	View::make('admin.users.users_overview')
                                                                ->with('users', User::orderBy('firstname')->get());
	}

	public function getEdit($id = null)
	{
		$user = null;
		if(!is_null($id))
		{
			$user = User::find($id);
			$this->layout->title				=	'Gebruiker \'' . $user->firstname . '\' wijzigen';
			$this->layout->content->title		=	'Gebruiker \'' . $user->firstname . '\' wijzigen';
		}

		if (is_null($user))
		{
			$user = new User();
			$this->layout->title				=	'Gebruiker toevoegen';
			$this->layout->content->title		=	'Gebruiker toevoegen';
		}

		$this->layout->content->content		=	View::make('admin.users.users_edit')
                                                                        ->with('user', $user)
                                                                        ->with('roles', Role::orderBy('name')->get());
	}

	public function edit($id = null)
	{            
		$user = null;
		if(!is_null($id))
		{
			$user = User::find($id);
		}
		if (is_null($user))
		{
			$user = new User();
		}

		// Declare the rules for the form validation	
		$rules = array(
			'firstname'			=>	'required',
			'email' 			=> 	'required|email',
			'lastname'			=>	'required',
			'address'			=>	'required',
			'housenumber'		=>	'required',
			'zipcode'			=>	'required',
			'city'				=>	'required'
		);
        
		// If its a new user a password is mandatory
		if(is_null($id))
		{
			$rules['wachtwoord'] = 'required';
		}

		//Get all the inputs
		$inputs = Input::all();

		//Validate the inputs
		$validator = Validator::make($inputs, $rules);

		//Check if the form validation with success
		if($validator->passes())
		{
			// Create the user
			$user->firstname		= Input::get('firstname');
			$user->email            = Input::get('email');
			$user->lastname			= Input::get('lastname');
			$user->address			= Input::get('address');
			$user->housenumber		= Input::get('housenumber');
			$user->zipcode			= Input::get('zipcode');
			$user->city 			= Input::get('city');

			// Heeft de gebruiker een password ingevuld?
			// Zo ja.. HASH het password en sla vervolgens alles op.
			if(Input::has('wachtwoord'))
			{
				$user->password	=	Hash::make(Input::get('wachtwoord'));
			}

			$user->save();

			// Assign roles
           	$user->roles()->detach();
            if(is_array(Input::get('roles')))
            {
            	$user->roles()->attach(Input::get('roles'));
            }


			return Redirect::to('admin/users')->with('success', 'Gebruiker \'' . $user->firstname . '\' is toegevoegd/gewijzigd ');
		}
		{ 	
			return Redirect::to('admin/users/edit/' . $user->id)
                                ->withErrors($validator);
		}
	}

	public function getDelete($id = null)
	{
		$user = User::find($id);
                //$user->roles()->detach();
		if(is_null($user))
		{
			return Redirect::to('admin/users')->with('warning', 'Er is geen gebruiker bekend');
		}
		elseif($user->email == 'rietengriet@tafel.nl')
		{
			return Redirect::to('admin/users')->with('warning', 'De gebruiker met mail adres \'rietengriet@tafel.nl\' mag niet verwijderd worden');
		}
		elseif($user->id == 1)
		{
			return Redirect::to('admin/users')->with('warning', 'De gebruiket met ID \'1\' mag niet verwijderd worden');
		}
        elseif($user->id == Auth::user()->id)
        {
        	return Redirect::to('admin/users')->with('warning', 'Je kunt jezelf niet verwijderen!');
        }

		$user->delete();

		return Redirect::to('admin/users')->with('success', 'Gebruiker  \'' . $user->naam . '\' is verwijderd');
	}

}