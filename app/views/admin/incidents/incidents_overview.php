<?php if(Session::has('success')): ?>
	<div class="alert alert-success"><?php echo Session::get('success'); ?></div>
<?php endif; ?>
<?php if(Session::has('warning')): ?>
	<div class="alert alert-danger"><?php echo Session::get('warning'); ?></div>
<?php endif; ?>



<?php if(!empty($incidents)): ?>



  	<table class="table table-striped">
    <thead>
    	<tr>
		    <th>Incident nummer</th>
		    <th>Status</th>
		    <th>Classificatie</th>
		    <th>Aangemaakt op</th>

		    <th>Acties</th>
	    </tr>
	</thead>
	<tbody>
		<?php foreach($incidents as $item): ?>
		<tr>
			<td><?php echo $item->id; ?></td>
			<td><?php echo $item->status; ?></td>
			<td><?php echo $item->classification; ?></td>
			<td><?php echo $item->created_at; ?></td>

			<td>
				<a href="<?php echo Request::root(); ?>/admin/incidents/edit/<?php echo $item->id ?>"><i class="fa fa-edit"></i> Bekijken</a>
				<!-- <a href="<?php //echo Request::root(); ?>/admin/incidents/info/<?php //echo $item->id ?>"><i class="fa fa-info"></i> Informatie</a>	
				<a href="<?php //echo Request::root(); ?>/admin/incidents/delete/<?php //echo $item->id ?>"><i class="fa fa-trash-o"></i> Verwijderen</a> -->	
			<td>
	    </tr>
		<?php endforeach; ?>		
	</tbody>
</table>

<?php else: ?>
	Er zijn nog geen incident items.
<?php endif;?>






