<?php if(Session::has('success')): ?>
	<div class="alert alert-success"><?php echo Session::get('success'); ?></div>
<?php endif; ?>
<?php if(Session::has('warning')): ?>
	<div class="alert alert-danger"><?php echo Session::get('warning'); ?></div>
<?php endif; ?>

<?php if(!empty($users)): ?>

<table class="table table-striped">
    <thead>
    	<tr>
		    <th>Naam</th>
		    <th>E-mailadres</th>
		    <th>Acties</th>
	    </tr>
	</thead>
	<tbody>
		<?php foreach($users as $user): ?>
		<tr>
			<td><?php echo $user->firstname; ?></td>
			<td><?php echo $user->email; ?></td>
			<td>
				<a href="<?php echo Request::root(); ?>/admin/users/edit/<?php echo $user->id ?>"><i class="fa fa-edit"></i> Bewerken </a>
				<?php if($user->id != '1'):?>
					<a href="<?php echo Request::root(); ?>/admin/users/delete/<?php echo $user->id ?>"><i class="fa fa-trash-o"></i> Verwijderen </a>
				<?php endif;?>			
			<td>
	    </tr>
		<?php endforeach; ?>		
	</tbody>
</table>

<?php else: ?>
	Er zijn nog geen gebruikers.
<?php endif;?>
