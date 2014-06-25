<!-- <form class="form-horizontal" role="form" method="POST">


	<ul id="sortable">
		<?php foreach($questions as $question): ?>
			<li class="ui-state-default"><input type="hidden" value="<?php echo $question->id; ?>" name="item[]" /><?php echo $question->title; ?></li>
		<?php endforeach; ?>
	</ul>
 


 	<div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default">Opslaan <i class="icon-save"></i></button>
            <a href="<?php echo Request::root(); ?>/admin/questions/sort" class="btn btn-default">Annuleren <i class=""></i></a>
        </div>
    </div>
</form> -->



<?php if(Session::has('success')): ?>
	<div class="alert alert-success"><?php echo Session::get('success'); ?></div>
<?php endif; ?>
<?php if(Session::has('warning')): ?>
	<div class="alert alert-danger"><?php echo Session::get('warning'); ?></div>
<?php endif; ?>

<?php if(!empty($questions)): ?>

<form class="form-horizontal" role="form" method="POST">
<table id="sort" class="table table-striped">
    <thead>
    	<tr>
		    <th>ID</th>
		    <th>Vraag</th>
		    <th>Acties</th>
	    </tr>
	</thead>
	<tbody>
		<?php foreach($questions as $question): ?>
		<tr>
			<td><?php echo $question->id; ?></td>
			<td><?php echo $question->title; ?></td>
			<td>
				<input type="hidden" value="<?php echo $question->id; ?>" name="item[]" />				
				<a href="<?php echo Request::root(); ?>/admin/users/edit/<?php echo $question->id ?>"><i class="fa fa-edit"></i> Bewerken </a>
				<a href="<?php echo Request::root(); ?>/admin/users/delete/<?php echo $question->id ?>"><i class="fa fa-trash-o"></i> Verwijderen </a>
			<td>
	    </tr>
		<?php endforeach; ?>		
	</tbody>
</table>

<div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default">Opslaan <i class="icon-save"></i></button>
            <a href="<?php echo Request::root(); ?>/admin/questions/sort" class="btn btn-default">Annuleren <i class=""></i></a>
        </div>
    </div>
</form>
<?php else: ?>
	Er zijn nog geen vragen.
<?php endif;?>