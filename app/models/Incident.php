<?php



class Incident extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'incidents';


	public function hardware()
    {
        return $this->belongsTo('Hardware', 'hardware_id');
    }

   	public function messages()
    {
        return $this->hasMany('IncidentMessage', 'incident_id');
    }

    public static function classifications()
    {
        $classifications = array(
                1        =>  '1',
                2         =>  '2',
                3       =>  '3',
                4   =>  '4'
        );
            return $classifications;
    }



}
