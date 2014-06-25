<?php

class BaseController extends Controller
{

	public $layout = 'layouts.boilerplate';

	public function __construct()
	{	
		$this->layout = View::make($this->layout);

		$this->layout->title = 'no title set';
		$this->layout->content = View::make('template');
		$this->layout->content->content = 'no content set';
	}
}
