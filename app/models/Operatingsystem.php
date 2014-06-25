<?php

class Operatingsystem extends Eloquent
{
	protected $table = 'operatingsystems';


	public function hardware()
    {
    	return $this->hasMany('Hardware', 'operatingsystem_id');
    }

}
