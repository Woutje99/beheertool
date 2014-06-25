<?php if($errors->count() > 0 ): ?>
    <div class="alert alert-danger">
        <?php foreach($errors->all() as $message): ?>
            - <?php echo $message ?> <br />
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form class="form-horizontal" role="form" method="POST" action="<?php echo Request::root(); ?>/incident/aanmaken/saveIncident">

    <?php echo Form::token(); ?>


  <div class="form-group">
        <label for="selectRoles" class="col-lg-2 control-label">Hardware-item</label>
        <div class="col-lg-10">
        <select id="selectLocation" class="form-control" name="hardwareid">
        <?php foreach($hardware as $item): ?>
            <option value="<?php echo $item->id; ?>"><?php echo $item->identificationcode . ' - ' . $item->location->name ; ?></option>
        <?php endforeach; ?>
        </select>
        </div>
    </div>

   <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Omschrijving</label>
        <textarea class="form-control" rows="3" name="description"></textarea>
    </div>
  
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default">Incident aanmaken <i class="icon-save"></i></button>
        </div>
    </div>
    
</form>