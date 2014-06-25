<?php



class SoftwareHardware extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'software_hardware';


 	public function software() {
        return $this->belongsTo('Software', 'software_id');
    }
    
    public function hardware() {
        return $this->belongsTo('Hardware_id', 'hardware_id');
    }

}
