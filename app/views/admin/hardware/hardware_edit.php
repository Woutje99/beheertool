<?php if($errors->count() > 0 ): ?>
    <div class="alert alert-danger">
        <?php foreach($errors->all() as $message): ?>
            - <?php echo $message ?> <br />
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form class="form-horizontal" role="form" method="POST">
   
    <?php echo Form::token(); ?>
    <?php echo Form::hidden('id', $hardware->id); ?>
   
   <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Identificatiecode</label>
        <div class="col-lg-10">
            <input type="text" name="identificationcode" value="<?php echo $hardware->identificationcode; ?>" class="form-control" id="inputName" placeholder="Identificatiecode">
        </div>
    </div>
    <div class="form-group">
        <label for="selectRoles" class="col-lg-2 control-label">Locaties</label>
        <div class="col-lg-10">
        <?php
            $selected = $hardware->locations_id;
        ?>
        <select id="selectLocation" class="form-control" name="location_id">
        <?php foreach($locations as $location): ?>
            <option value="<?php echo $location->id; ?>"<?php if($selected == $location->id) echo 'selected'; ?>><?php echo $location->name; ?></option>
        <?php endforeach; ?>
        </select>
        </div>
    </div>

    <div class="form-group">
        <label for="selectRoles" class="col-lg-2 control-label">Leverancier</label>
        <div class="col-lg-10">
        <?php
            $selected = $hardware->suppliers_id;
        ?>
        <select id="selectLocation" class="form-control" name="suppliers_id">
        <?php foreach($suppliers as $supplier): ?>
            <option value="<?php echo $supplier->id; ?>"<?php if($selected == $supplier->id) echo 'selected'; ?>><?php echo $supplier->name; ?></option>
        <?php endforeach; ?>
        </select>
        </div>
    </div>

    <div class="form-group">
        <label for="selectRoles" class="col-lg-2 control-label">Soort hardware</label>
        <div class="col-lg-10">
        <?php
            $selected = $hardware->sort;
        ?>
        <select id="selectLocation" class="form-control" name="sort">
        <?php foreach(Hardware::sorts() as $key => $value): ?>
            <option value="<?php echo $key ?>"<?php if($selected == $key) echo 'selected'; ?>><?php echo $value ?></option>
        <?php endforeach; ?>
        </select>
        </div>
    </div>

    <div class="form-group">
        <label for="inputyear_purchase" class="col-lg-2 control-label">Aanschafjaar</label>
        <div class="col-lg-10">
            <input type="text" name="year_purchase" value="<?php echo $hardware->year_purchase; ?>" class="form-control" id="inputyear_purchase" placeholder="Aanschafjaar">
        </div>
    </div>

        <div class="form-group">
        <label for="selectRoles" class="col-lg-2 control-label">Besturingssysteem</label>
        <div class="col-lg-10">
        <?php
            $selected = $hardware->opeartingsystems_id;
        ?>
        <select id="selectLocation" class="form-control" name="operatingsystems_id">
        <?php foreach($operatingsystems as $os): ?>
            <option value="<?php echo $os->id; ?>"<?php if($selected == $os->id) echo 'selected'; ?>><?php echo $os->name; ?></option>
        <?php endforeach; ?>
        </select>
        </div>
    </div>

    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Merk</label>
        <div class="col-lg-10">
            <input type="text" name="brand" value="<?php echo $hardware->brand; ?>" class="form-control" id="inputName" placeholder="Merk">
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


