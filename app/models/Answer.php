<?php



class Answer extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'answers';


	 public function menuIngredients()
     {
     	return $this->hasMany('AnswerQuestion', 'answer_id');
     }

}
