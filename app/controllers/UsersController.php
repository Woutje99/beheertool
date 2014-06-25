<?php

class UsersController extends BaseController
{
	public function getLogin()
	{
		$this->layout->title = 'Inloggen bij Scholengemeenschap de Hondsrug';
		$this->layout->content->title = 'Inloggen bij Scholengemeenschap de Hondsrug';
		$this->layout->content->content = View::make('users.login');
	}

    public function login()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );


        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails())
        {
			return Redirect::to('/login')->withErrors($validator)->withInput();
        }
		else
		{
            // create our user data for the authentication
            $credentials = array(
                'password' => Input::get('password'),
                'email' => Input::get('email'),
            );

            // attempt to do the login
            if (Auth::attempt($credentials))
            {
                return Redirect::to('/account')->with('success', 'Welkom \'' . Auth::user()->firstname . '\' ');
            } 
            else
            {
                // validation not successful, send back to form	
                return Redirect::to('/login')->with('error', 'De combinatie gebruikersnaam/wachtwoord is niet gevonden of het account is nog niet geactiveerd');
            }
        }
    }

    public function getAccount()
    {
        $incidents = Incident::where('users_id', Auth::user()->id)->get();
    	$this->layout->title = 'Accountgegevens';
        $this->layout->content->title = 'Account van \'' . Auth::user()->firstname . '\' bij Scholengemeenschap de Hondsrug';
 		$this->layout->content->content = View::make('users.account')->with('user', Auth::user())->with('incidents', $incidents);	

    }

    public function getEdit()
    {
    	$this->layout->title = 'Accountgegevens wijzigen';
        $this->layout->content->title = 'Account van \'' . Auth::user()->firstname . '\' wijzigen';
        $this->layout->content->content = View::make('users.edit')->with('user', Auth::user());
    }

    public function getShowIncident()
    {
        $id = Input::get('incidentid');

        $incident = Incident::find($id);

        $incidentmessages = IncidentMessage::where('incident_id', '=', $id)->get();

        $this->layout->title = 'Incident met incidentnummer ' . $id;
        $this->layout->content->title = 'Incident met incidentnummer ' . $id;
        $this->layout->content->content = View::make('users.showincident')->with('incident', $incident)->with('incidentmessages', $incidentmessages);
    }

    public function messages()
    {
        if($_POST)
        {
           $id = Input::get('incidentid');

        $incident = Incident::find($id);

        $incidentmessages = IncidentMessage::where('incident_id', '=', $id)->get();

        $this->layout->title = 'Incident met incidentnummer ' . $id;
        $this->layout->content->title = 'Incident met incidentnummer ' . $id;
        $this->layout->content->content = View::make('users.showincident')->with('incident', $incident)->with('incidentmessages', $incidentmessages);

        $incidentmessage = new IncidentMessage();
        $incidentmessage->message = Input::get('message');
        $incidentmessage->user_id = Auth::user()->id;
        $incidentmessage->incident_id = $id;
        $incidentmessage->save();

        return Redirect::to('/account')->with('success', 'Bericht is verstuurd');
    
        }
    }



    public function edit()
    {
  		$id = Auth::user()->id;

        $user = User::find($id);

        // Declare the rules for the form validation    
        $rules = array(
            'firstname'         =>  'required',
            'lastname'          =>  'required',
            'address'           =>  'required',
            'housenumber'       =>  'required',
            'zipcode'           =>  'required',
            'city'              =>  'required'
        );

        //Get all the inputs
        $inputs = Input::all();

        //Validate the inputs
        $validator = Validator::make($inputs, $rules);

        //Check if the form validation with success
        if($validator->passes())
        {
            // Create the user
            $user->firstname        = Input::get('firstname');
            $user->lastname         = Input::get('lastname');
            $user->address          = Input::get('address');
            $user->housenumber      = Input::get('housenumber');
            $user->zipcode          = Input::get('zipcode');
            $user->city             = Input::get('city');

            $user->save();


            return Redirect::to('/account')->with('success', 'Accountgegevens van \'' . $user->firstname . '\' zijn aangepast.');
        } 
        else 
        {
            return Redirect::to('/account/wijzigen/' . $user->id)->withErrors($validator)->withInput(Input::except('wachtwoord'));
        }
    }


    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('')->with('success', 'U bent nu uitgelogd');
    }
}