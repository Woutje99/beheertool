<?php if(Session::has('success')): ?>
	<div class="alert alert-success"><?php echo Session::get('success'); ?></div>
<?php endif; ?>
<?php if(Session::has('warning')): ?>
	<div class="alert alert-danger"><?php echo Session::get('warning'); ?></div>
<?php endif; ?>



<?php if(!empty($hardware)): ?>



  	<table class="table table-striped">
    <thead>
    	<tr>
		    <th>Identificatiecode</th>
		    <th>Soort</th>
		    <th>Locatie</th>

		    <th>Acties</th>
	    </tr>
	</thead>
	<tbody>
		<?php foreach($hardware as $item): ?>
		<tr>
			<td><?php echo $item->identificationcode; ?></td>
			<td><?php echo $item->sort; ?></td>
			<td><?php echo $item->location->name; ?></td>

			<td>
				<a href="<?php echo Request::root(); ?>/admin/hardware/edit/<?php echo $item->id ?>"><i class="fa fa-edit"></i> Bewerken</a>
<!-- 				<a href="<?php //echo Request::root(); ?>/admin/hardware/info/<?php //echo $item->id ?>"><i class="fa fa-info"></i> Informatie</a>	 -->
<!-- 				<a href="<?php //echo Request::root(); ?>/admin/hardware/delete/<?php //echo $item->id ?>"><i class="fa fa-trash-o"></i> Verwijderen</a>	 -->
			<td>
	    </tr>
		<?php endforeach; ?>		
	</tbody>
</table>

<?php else: ?>
	Er zijn nog geen hardware items.
<?php endif;?>






