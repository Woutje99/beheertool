<?php

class IncidentsController extends BaseController 
{


	public function getIndex()
	{
		Session::forget('static_key');

		$this->layout->title				=	'Incident aanmaken';
		$this->layout->content->title		= 	'Incident aanmaken';
		$this->layout->content->content		=	View::make('incidents.incident_create');
	}

	public function getQuestions($order = null)
	{
		$this->layout->title				=	'Incident formulier';
		$this->layout->content->title		= 	'Incident formulier';
		$this->layout->content->content		=	View::make('incidents.incident_form')
													->with('question', Question::where('order', '=', $order)->first())
													->with('answers', Answer::all())
													->with('order', $order);
	}

	public function addQuestionAnswer()
	{
		if(Input::get('questionid') && Input::get('answerid'))
		{

			$countquestions = Question::all()->count();	

			$questionid = Input::get('questionid');
			$answerid = Input::get('answerid');

			Session::push('static_key', array($questionid => $answerid)); 

			$segment = Request::segment(4);
		
			$nextquestion = $segment + 1;
			//die($segment);

			if($nextquestion > $countquestions)
			{
				return Redirect::to('incident/aanmaken/overige');
			}

			return Redirect::to('incident/aanmaken/formulier/'. $nextquestion.'');
		}
		else
		{
			return Redirect::to('incident/aanmaken')->with('warning', 'Er ging iets mis, probeer het opnieuw!');
		}
	}

	public function remainder()
	{
		$hardware = Hardware::all();

		$this->layout->title				=	'Incident formulier';
		$this->layout->content->title		= 	'Incident formulier';
		$this->layout->content->content		=	View::make('incidents.incident_remainder')
												->with('hardware', $hardware);
	}

	public function saveIncident()
	{

		if($_POST)
		{

			// Declare the rules for the form validation	
			$rules = array(
				'hardwareid'	=>	'required',
				'description'	=>	'required'
			);

			//Get all the inputs
			$inputs = Input::all();

			//Validate the inputs
			$validator = Validator::make($inputs, $rules);

			//Check if the form validation with success
			if($validator->passes())
			{
				$incident = new Incident();
				$incident->hardware_id		=	Input::get('hardwareid');
				$incident->users_id			=	Auth::user()->id;
				$incident->hardware_id		=	Input::get('hardwareid');
				$incident->description		=	Input::get('description');
				$incident->classification	=	0;
				$incident->save();

				$incidentid = $incident->id;
			
				foreach (Session::get('static_key') as $key => $value)
				{	
					foreach($value as $questionid => $answerid)
					{
						$answerquestion = new AnswerQuestion();
						//die($incident);
						$answerquestion->question_id	=	$questionid;
						$answerquestion->answer_id		=	$answerid;
						$answerquestion->incident_id	=	$incident->id;
						$answerquestion->save();
					}
				}
				return Redirect::to('')->with('success', 'Incident is aangemaakt');
			}
			else
			{
				return Redirect::to('incident/aanmaken/overige')->withErrors($validator);
			}
		} 
	}

}