<?php

class AdminQuestionsController extends AdminBaseController
{
	public function getIndex()
	{
		$this->layout->title				=	'Vragen overzicht';
		$this->layout->content->title		= 	'Vragen overzicht';
		$this->layout->content->content		=	View::make('admin.questions.questions_overview')
                                                                ->with('questions', Question::orderBy('order')->where('active', '=', 'on')->get());
	}

	public function getEdit($id = null)
	{
		$question = null;
		if(!is_null($id))
		{
			$question = Question::find($id);
			$this->layout->title				=	'Hardware \'' . $question->title . '\' wijzigen';
			$this->layout->content->title		=	'Hardware \'' . $question->title . '\' wijzigen';
		}

		if (is_null($question))
		{
			$question = new Question();
			$this->layout->title				=	'Vraag toevoegen';
			$this->layout->content->title		=	'Vraag toevoegen';
		}

		$this->layout->content->content		=	View::make('admin.questions.questions_edit')->with('question', $question);

	}

	public function edit($id = null)
	{
		$question = null;
		if(!is_null($id))
		{
			$question = Question::find($id);
		}
		if (is_null($question))
		{
			$question = new Question();
		}

		// Declare the rules for the form validation	
		$rules = array(
			'title'	=>	'required'
		);

		//Get all the inputs
		$inputs = Input::all();

		//Validate the inputs
		$validator = Validator::make($inputs, $rules);

		//Check if the form validation with success
		if($validator->passes())
		{
			// Create the user
			$question->title	=	Input::get('title');
			$question->save();

			return Redirect::to('admin/questions')->with('success', 'Vraag \'' . $question->title . '\' is toegevoegd/gewijzigd ');
		}
		else
		{ 	
			return Redirect::to('admin/question/edit/' . $question->id)->withErrors($validator);
		}

	}

	public function getSort()
	{
		$this->layout->title				=	'Vragen sorteren';
		$this->layout->content->title		= 	'Vragen sorteren';
		$this->layout->content->content		=	View::make('admin.questions.questions_sort')
                                                                ->with('questions', Question::orderBy('order')->where('active', '=', 'on')->get());
	}

	public function sort()
	{
		$question = null;
		
		if($_POST)
		{
			$i = 1;
			foreach($_POST['item'] as $key => $value)
			{
				$question			=	Question::find($value);
				$question->order	=	$i;
				$question->save();
				$i++;
			}

			return Redirect::to('admin/questions/sort')->with('success', 'Volgorde vragen is succesvol gewijzigd');
		}
		else
		{
			return Redirect::to('admin/questions')->with('warning', 'Volgorde vragen is niet gewijzigd');
		}
	}

	public function getDelete($id = null)
	{
		$question = Question::find($id);
       
		if(is_null($question))
		{
			return Redirect::to('admin/questions')->with('warning', 'Deze vraag kan niet verwijderd worden');
		}
		
		$question->active = 'off';
		$question->save();

		return Redirect::to('admin/questions')->with('success', 'Vraag  \'' . $question->title . '\' is verwijderd');
	}
}