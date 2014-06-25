<?php if(Session::has('error')): ?>
  <div class="alert alert-danger"><?php echo Session::get('error'); ?></div>
<?php endif; ?>

<?php if($errors->count() > 0 ): ?>
    <div class="alert alert-danger">
        <?php foreach($errors->all() as $message): ?>
            - <?php echo $message ?> <br />
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form class="form-horizontal" role="form" method="POST">

    <?php echo Form::token(); ?>

    <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
            <input type="email" name="email" value="<?php echo Input::old('email');?>" class="form-control" id="inputEmail1" placeholder="Email">
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label">Wachtwoord</label>
        <div class="col-lg-10">
            <input type="password" name="password" value="<?php echo Input::old('password') ?>" class="form-control" id="inputPassword" placeholder="Wachtwoord">
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default">Inloggen <i class="icon-save"></i></button>
        </div>
    </div>
    
</form>