<?php

class IndexController extends BaseController
{
	public function getIndex()
	{
		$this->layout->title				=	'Scholengemeenschap de Hondsrug';
		$this->layout->content->title		= 	'Scholengemeenschap de Hondsrug';
		$this->layout->content->content		=	View::make('index');                                                              
	}
}