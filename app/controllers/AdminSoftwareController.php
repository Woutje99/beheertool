<?php 

class AdminSoftwareController extends AdminBaseController
{
	public function getIndex()
	{
		$this->layout->title				=	'Software overzicht';
		$this->layout->content->title		= 	'Software overzicht';
		$this->layout->content->content		=	View::make('admin.software.software_overview')
                                                                ->with('software', Software::orderBy('id')->get());
	}

	public function getEdit($id = null)
	{
		$software = null;
		if(!is_null($id))
		{
			$hardware = Software::find($id);
			$this->layout->title				=	'Software \'' . $software->identificationcode . '\' wijzigen';
			$this->layout->content->title		=	'Software \'' . $software->identificationcode . '\' wijzigen';
		}

		if (is_null($software))
		{
			$software = new Hardware();
			$this->layout->title				=	'Software-item toevoegen';
			$this->layout->content->title		=	'Software-item toevoegen';
		}

		$this->layout->content->content		=	View::make('admin.software.software_edit')
                                                                        ->with('software', $software)
                                                                        ->with('suppliers', Supplier::orderBy('id')->get());
	}

	public function edit($id = null)
	{            
		$software = null;
		if(!is_null($id))
		{
			$software = Software::find($id);
		}
		if (is_null($software))
		{
			$software = new Software();
		}

		// Declare the rules for the form validation	
		$rules = array(
			'name'					=>	'required',
			'identificationcode'	=>	'required',
			'description' 			=> 	'required',
			'producent'				=>	'required',	
			'suppliers_id'			=>	'required'
		);

		//Get all the inputs
		$inputs = Input::all();

		//Validate the inputs
		$validator = Validator::make($inputs, $rules);

		//Check if the form validation with success
		if($validator->passes())
		{
			// Create the software
			$software->name					=	Input::get('name');
			$software->identificationcode	=	Input::get('identificationcode');
			$software->description			=	Input::get('description');
			$software->producent			=	Input::get('producent');
			$software->suppliers_id			=	Input::get('suppliers_id');
			$software->number_of_licenses	=	Input::get('number_of_licenses');
			$software->number_of_users		=	Input::get('number_of_users');
			$software->save();

			return Redirect::to('admin/software')->with('success', 'Software \'' . $software->identificationcode . '\' is toegevoegd/gewijzigd ');
		}
		else
		{ 	
			return Redirect::to('admin/software/edit/' . $software->id)->withErrors($validator);
		}
	}

	public function getDelete($id = null)
	{
		$software = Software::find($id);
		if(is_null($software))
		{
			return Redirect::to('admin/software')->with('warning', 'Er is geen software bekend');
		}

		$software->delete();

		return Redirect::to('admin/software')->with('success', 'Software  \'' . $software->name . '\' is verwijderd');
	}

}