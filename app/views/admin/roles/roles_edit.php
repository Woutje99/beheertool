<?php if($errors->count() > 0 ): ?>
    <div class="alert alert-danger">
        <?php foreach($errors->all() as $message): ?>
            - <?php echo $message ?> <br />
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form class="form-horizontal" role="form" method="POST">
   
    <?php echo Form::token(); ?>

    <?php echo Form::hidden('id', $role->id); ?>

   <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Naam</label>
        <div class="col-lg-10">
            <input type="text" value="<?php echo $role->naam; ?>" name="naam" class="form-control" id="inputName" placeholder="Naam">
        </div>
    </div>
	<div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default">Opslaan <i class="icon-save"></i></button>
            <a href="<?php echo Request::root(); ?>/admin/roles" class="btn btn-default">Annuleren <i class=""></i></a>
        </div>
    </div>
</form>
