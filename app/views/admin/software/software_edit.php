<?php if($errors->count() > 0 ): ?>
    <div class="alert alert-danger">
        <?php foreach($errors->all() as $message): ?>
            - <?php echo $message ?> <br />
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form class="form-horizontal" role="form" method="POST">
   
    <?php echo Form::token(); ?>
    <?php echo Form::hidden('id', $software->id); ?>
   

    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Naam</label>
        <div class="col-lg-10">
            <input type="text" name="name" value="<?php echo $software->name; ?>" class="form-control" id="inputName" placeholder="Naam">
        </div>
    </div>

   <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Identificatiecode</label>
        <div class="col-lg-10">
            <input type="text" name="identificationcode" value="<?php echo $software->identificationcode; ?>" class="form-control" id="inputName" placeholder="Identificatiecode">
        </div>
    </div>

    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Beschrijving</label>
        <div class="col-lg-10">
            <input type="text" name="description" value="<?php echo $software->description; ?>" class="form-control" id="inputName" placeholder="Beschrijving">
        </div>
    </div>

    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Producent</label>
        <div class="col-lg-10">
            <input type="text" name="producent" value="<?php echo $software->producent; ?>" class="form-control" id="inputName" placeholder="Producent">
        </div>
    </div>

    <div class="form-group">
        <label for="selectRoles" class="col-lg-2 control-label">Leverancier</label>
        <div class="col-lg-10">
        <?php
            $selected = $software->suppliers_id;
        ?>
        <select id="selectLocation" class="form-control" name="suppliers_id">
        <?php foreach($suppliers as $supplier): ?>
            <option value="<?php echo $supplier->id; ?>"<?php if($selected == $supplier->id) echo 'selected'; ?>><?php echo $supplier->name; ?></option>
        <?php endforeach; ?>
        </select>
        </div>
    </div>

    <div class="form-group">
        <label for="Huisnummer" class="col-lg-2 control-label">Aantal licenties</label>
        <div class="col-lg-10" >
            <input style="width: 60px;" type="text" value="<?php echo $software->number_of_licenses;?>" name="number_of_licenses" class="form-control" id="inputHuisnummer" placeholder="#">
        </div>
    </div>
    <div class="form-group">
        <label for="Huisnummer" class="col-lg-2 control-label">Aantal gebruikers</label>
        <div class="col-lg-10" >
            <input style="width: 60px;" type="text" value="<?php echo $software->number_of_users;?>" name="number_of_users" class="form-control" id="inputHuisnummer" placeholder="#" >
        </div>
    </div>


    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default">Opslaan <i class="icon-save"></i></button>
            <a href="<?php echo Request::root(); ?>/admin/hardware" class="btn btn-default">Annuleren <i class=""></i></a>
        </div>
    </div>
</form>


