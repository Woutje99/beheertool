<?php



class AnswerQuestion extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'answers_questions';


 	public function answer() {
        return $this->belongsTo('Answer', 'answer_id');
    }
    
    public function question() {
        return $this->belongsTo('Question', 'question_id');
    }

}
