<?php



class Software extends Eloquent {

	
	protected $table = 'software';

   	public function softwareHardware()
    {
        return $this->hasMany('SoftwareHardware', 'software_id');
    }

}
