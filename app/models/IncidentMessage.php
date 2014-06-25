<?php

class IncidentMessage extends Eloquent
{
	protected $table = 'incidents_messages';

	public function messsages()
    {
    	return $this->belongsTo('Incident', 'incident_id');
    }

    public function user()
    {
   		return $this->belongsTo('User', 'user_id');
    }
}