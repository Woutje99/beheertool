<?php



class Role extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';


 /**
     * Get the users that are having this role.
     *
     * @return mixed
     */
    public function users() {
        return $this->belongsToMany('User', 'user_roles', 'role_id', 'user_id');
    }

}
