<?php if($errors->count() > 0 ): ?>
    <div class="alert alert-danger">
        <?php foreach($errors->all() as $message): ?>
            - <?php echo $message ?> <br />
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form class="form-horizontal" role="form" method="POST">
   
    <?php echo Form::token(); ?>
    <?php echo Form::hidden('id', $user->id); ?>
   
   <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Voornaam</label>
        <div class="col-lg-10">
            <input type="text" name="firstname" value="<?php echo $user->firstname; ?>" class="form-control" id="inputName" placeholder="Voornaam">
        </div>
    </div>

    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Achternaam</label>
        <div class="col-lg-10">
            <input type="text" name="lastname" value="<?php echo $user->lastname; ?>" class="form-control" id="inputName" placeholder="Achternaam">
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
            <input type="email" name="email" value="<?php echo $user->email; ?>" class="form-control" id="inputEmail1" placeholder="Email">
        </div>
    </div>

        <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label">Wachtwoord</label>
        <div class="col-lg-10">
            <input type="password" name="wachtwoord" class="form-control" id="inputPassword" placeholder="Wachtwoord">
        </div>
    </div>

     <div class="form-group">
        <label for="inputAdres" class="col-lg-2 control-label">Adres</label>
        <div class="col-lg-10" >
            <input type="text" name="address" value="<?php echo $user->address;?>" class="form-control" id="inputAdres" placeholder="Adres">
        </div>
    </div>
    <div class="form-group">
        <label for="Huisnummer" class="col-lg-2 control-label">Huisnummer</label>
        <div class="col-lg-10" >
            <input style="width: 60px;" type="text" value="<?php echo $user->housenumber;?>" name="housenumber" class="form-control" id="inputHuisnummer" >
        </div>
    </div>

    <div class="form-group">
        <label for="Postcode" class="col-lg-2 control-label">Postcode</label>
        <div class="col-lg-10">
            <input type="text" name="zipcode" value="<?php echo $user->zipcode;?>" class="form-control" id="inputPostcode" placeholder="Postcode">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputPlaats" class="col-lg-2 control-label">Plaats</label>
        <div class="col-lg-10">
            <input type="text" name="city" value="<?php echo $user->city;?>" class="form-control" id="inputPlaats" placeholder="Plaats">
        </div>
    </div>
    
    <div class="form-group">
        <label for="selectRoles" class="col-lg-2 control-label">Rollen</label>
        <div class="col-lg-10">
        <?php
        
            $user_roles = array();
            foreach($user->roles as $role){
                $user_roles[] = $role->id;
            }
            echo '<select id="selectRoles" class="form-control" name="roles[]" multiple="multiple">';
            foreach($roles as $role){
                $selected = (in_array($role->id, $user_roles)) ? 'selected="selected"' : '';
                echo '<option value="' . $role->id . '" ' . $selected . '>' . $role->name . '</option>';
            }
            echo '</select>';
            echo 'Houd ctrl/command ingedrukt om meerdere rollen te selecteren.';
         ?>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default">Opslaan <i class="icon-save"></i></button>
            <a href="<?php echo Request::root(); ?>/admin/users" class="btn btn-default">Annuleren <i class=""></i></a>
        </div>
    </div>
</form>
