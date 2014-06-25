<?php

class AdminDashboardController extends AdminBaseController
{
	public function getIndex()
	{
		$this->layout->title				=	'Dashboard';
		$this->layout->content->title		= 	'Dashboard';
		$this->layout->content->content		=	View::make('admin.dashboard_overview');
                                                             
	}
}