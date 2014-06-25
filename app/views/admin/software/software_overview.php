<?php if(Session::has('success')): ?>
	<div class="alert alert-success"><?php echo Session::get('success'); ?></div>
<?php endif; ?>
<?php if(Session::has('warning')): ?>
	<div class="alert alert-danger"><?php echo Session::get('warning'); ?></div>
<?php endif; ?>



<?php if(!empty($software)): ?>



  	<table class="table table-striped">
    <thead>
    	<tr>
		    <th>Naam</th>
		    <th>Identificatiecode</th>
		    <th>Beschrijving</th>

		    <th>Acties</th>
	    </tr>
	</thead>
	<tbody>
		<?php foreach($software as $item): ?>
		<tr>
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->identificationcode; ?></td>
			<td><?php echo $item->description; ?></td>
			<td>
				<a href="<?php echo Request::root(); ?>/admin/software/edit/<?php echo $item->id ?>"><i class="fa fa-edit"></i> Bewerken</a>
				<!-- <a href="<?php echo Request::root(); ?>/admin/software/info/<?php echo $item->id ?>"><i class="fa fa-info"></i> Informatie</a>	 -->
				<a href="<?php echo Request::root(); ?>/admin/software/delete/<?php echo $item->id ?>"><i class="fa fa-trash-o"></i> Verwijderen</a>	
			<td>
	    </tr>
		<?php endforeach; ?>		
	</tbody>
</table>

<?php else: ?>
	Er zijn nog geen software items.
<?php endif;?>






