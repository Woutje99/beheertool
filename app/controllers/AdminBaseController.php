<?php 

class AdminBaseController extends Controller
{
	public $layout = 'layouts.admin.boilerplate';

	public function __construct()
	{	
		$this->layout = View::make($this->layout);

		$this->layout->title = 'no title set';
		$this->layout->content = View::make('admin.template');
		$this->layout->content->content = 'no content set';
	}

}