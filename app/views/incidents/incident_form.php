<form method="POST" action="<?php echo Request::root(); ?>/incident/aanmaken/addQuestionAnswer/<?php echo $order; ?>">

	<?php echo $question->title; ?>
	<input type="hidden" value="<?php echo $question->id; ?>" name="questionid" />
	</br>
	<?php foreach($answers as $answer): ?>
		<input type="radio" name="answerid" value="<?php echo $answer->id ?>" /><?php echo $answer->name; ?>
	<?php endforeach; ?>

	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default">Naar de volgende vraag <i class="icon-save"></i></button>
		</div>
	</div>

</form>