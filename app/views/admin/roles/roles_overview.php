<?php if(Session::has('success')): ?>
	<div class="alert alert-success"><?php echo Session::get('success'); ?></div>
<?php endif; ?>
<?php if(Session::has('warning')): ?>
	<div class="alert alert-danger"><?php echo Session::get('warning'); ?></div>
<?php endif; ?>


<?php if(!empty($roles)): ?>

<table class="table table-striped">
    <thead>
    	<tr>
		    <th>Naam</th>
		    <th>Acties</th>
	    </tr>
	</thead>
	<tbody>
		<?php foreach($roles as $role): ?>
		<tr>
			<td><?php echo $role->name; ?></td>
			<td>
				<a href="<?php echo Request::root(); ?>/admin/roles/edit/<?php echo $role->id ?>"><i class="fa fa-edit"></i> Bewerken </a>		
				<a href="<?php echo Request::root(); ?>/admin/roles/delete/<?php echo $role->id ?>"><i class="fa fa-trash-o"></i> Verwijderen </a>		
			<td>
	    </tr>
		<?php endforeach; ?>		
	</tbody>
</table>

<?php else: ?>
	Er zijn nog geen rollen.
<?php endif;?>
