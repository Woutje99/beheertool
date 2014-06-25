<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	    /**
	 * Get the roles belonging to the user
	 *
	 * @return mixed
	 */        
        public function roles(){
            return $this->belongsToMany('Role', 'user_roles', 'user_id', 'role_id');
        }

         public function hasRole($rolename)
        {
                return in_array($rolename, array_fetch($this->roles->toArray(), 'name'));
        }


     public function user()
    {
   		return $this->belongsTo('IncidentMessage', 'user_id');
    }

}
