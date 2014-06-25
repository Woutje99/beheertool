<?php



class Location extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'locations';


	public function hardware()
    {
        return $this->hasMany('Hardware', 'locations_id');
    }

}
