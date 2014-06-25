<?php

class Hardware extends Eloquent
{
	protected $table = 'hardware';

	public function location()
    {
        return $this->belongsTo('Location', 'locations_id');
    }

   	public function incident()
    {
        return $this->hasMany('Incident', 'hardware_id');
    }

    public function softwareHardware()
    {
        return $this->hasMany('SoftwareHardware', 'hardware_id');
    }

    public function operatingsystem()
    {
        return $this->belongsTo('Operatingsystem', 'operatingsystem_id');
    }

    public static function sorts()
    {
        $sorts = array(
                'switch'        =>  'Switch',
                'modem'         =>  'Modem',
                'printer'       =>  'Printer',
                'werkstation'   =>  'Werkstation'
        );
            return $sorts;
    }


}
