<?php if(Session::has('success')): ?>
	<div class="alert alert-success"><?php echo Session::get('success'); ?></div>
<?php endif; ?>
<?php if(Session::has('warning')): ?>
	<div class="alert alert-danger"><?php echo Session::get('warning'); ?></div>
<?php endif; ?>

<?php if(!empty($questions)): ?>

<table class="table table-striped">
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
				<a href="<?php echo Request::root(); ?>/admin/questions/edit/<?php echo $question->id ?>"><i class="fa fa-edit"></i> Bewerken </a>
				<a href="<?php echo Request::root(); ?>/admin/questions/delete/<?php echo $question->id ?>"><i class="fa fa-trash-o"></i> Verwijderen </a>
			<td>
	    </tr>
		<?php endforeach; ?>		
	</tbody>
</table>

<?php else: ?>
	Er zijn nog geen vragen.
<?php endif;?>
