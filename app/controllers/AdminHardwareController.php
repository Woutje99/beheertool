<?php 

class AdminHardwareController extends AdminBaseController
{
	public function getIndex()
	{
		$this->layout->title				=	'Hardware overzicht';
		$this->layout->content->title		= 	'Hardware overzicht';
		$this->layout->content->content		=	View::make('admin.hardware.hardware_overview')
                                                                ->with('hardware', Hardware::orderBy('id')->get())
                                                                ->with('location', Location::orderBy('id')->get());
	}

	public function getEdit($id = null)
	{
		$hardware = null;
		if(!is_null($id))
		{
			$hardware = Hardware::find($id);
			$this->layout->title				=	'Hardware \'' . $hardware->identificationcode . '\' wijzigen';
			$this->layout->content->title		=	'Hardware \'' . $hardware->identificationcode . '\' wijzigen';
		}

		if (is_null($hardware))
		{
			$hardware = new Hardware();
			$this->layout->title				=	'Hardware-item toevoegen';
			$this->layout->content->title		=	'Hardware-item toevoegen';
		}

		$this->layout->content->content		=	View::make('admin.hardware.hardware_edit')
                                                                        ->with('hardware', $hardware)
                                                                        ->with('locations', Location::orderBy('id')->get())
                                                                        ->with('suppliers', Supplier::orderBy('id')->get())
                                                                        ->with('operatingsystems', Operatingsystem::orderBy('id')->get());
	}

	public function edit($id = null)
	{            
		$hardware = null;
		if(!is_null($id))
		{
			$hardware = Hardware::find($id);
		}
		if (is_null($hardware))
		{
			$hardware = new Hardware();
		}

		// Declare the rules for the form validation	
		$rules = array(
			'identificationcode'	=>	'required',
			'location_id'			=>	'required',
			'suppliers_id'			=>	'required',
			'sort' 					=> 	'required',
			'year_purchase'			=>	'required',
			'brand'					=>	'required'
		);

		//Get all the inputs
		$inputs = Input::all();

		//Validate the inputs
		$validator = Validator::make($inputs, $rules);

		//Check if the form validation with success
		if($validator->passes())
		{
			// Create the user
			$hardware->identificationcode	=	Input::get('identificationcode');
			$hardware->locations_id			=	Input::get('location_id');
			$hardware->suppliers_id			=	Input::get('suppliers_id');
			$hardware->sort					=	Input::get('sort');
			$hardware->year_purchase		=	Input::get('year_purchase');
			$hardware->operatingsystems_id	=	Input::get('operatingsystems_id');
			$hardware->brand				=	Input::get('brand');
			$hardware->save();

			return Redirect::to('admin/hardware')->with('success', 'Hardware \'' . $hardware->identificationcode . '\' is toegevoegd/gewijzigd ');
		}
		else
		{ 	
			return Redirect::to('admin/hardware/edit/' . $hardware->id)
                                ->withErrors($validator);
		}
	}

	public function getSoftwareByHardware($id = null)
	{
		$softwarehardware = null;
        if (!is_null($id))
        {
        	$softwarehardware = SoftwareHardware::where('hardware_id', $id)->orderBy('id', 'sofware_id')->get();

        	$hardwarecomponent = Hardware::find($id);

        	$this->layout->title = 'Software op hardware component \'' . $hardwarecomponent->identificationcode . '\'';
            $this->layout->content->title = 'Software op hardware component \'' . $hardwarecomponent->identificationcode . '\'';
        }

        $this->layout->content->content = View::make('admin.hardware.software_hardware')
        										->with('softwarehardware', $softwarehardware)
        										->with('hardwarecomponent', $hardwarecomponent);
	}


	public function getDelete($id = null)
	{
		$hardware = Hardware::find($id);
       
		if(is_null($hardware))
		{
			return Redirect::to('admin/hardware')->with('warning', 'Dit hardware component kan niet verwijderd wordne');
		}

		$hardware->delete();

		return Redirect::to('admin/hardware')->with('success', 'Hardware  \'' . $hardware->identificationcode . '\' is verwijderd');
	}

}