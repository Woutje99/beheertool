<?php



class Question extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'questions';


	public function menuIngredients()
    {
    	return $this->hasMany('AnswerQuestion', 'question_id');
    }

}
