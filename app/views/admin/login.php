<?php if(Session::has('error')): ?>
  <div class="alert alert-danger"><?php echo Session::get('error'); ?></div>
<?php endif; ?>

<?php if(Session::has('success')): ?>
  <div class="alert alert-success"><?php echo Session::get('success'); ?></div>
<?php endif; ?>

<?php if($errors->count() > 0 ): ?>
    <div class="alert alert-danger">
        <?php foreach($errors->all() as $message): ?>
            - <?php echo $message ?> <br />
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Inloggen CMS  - Scholengemeenschap de Hondsrug</h4>
      </div>

      <div class="modal-body">
      <form class="form-horizontal" method="POST">
        <div class="form-group">
          <label style="float:left;" class="col-lg-2 control-label" for="username">E-mailadres</label>
          <div class="col-lg-10">
            <input type="text" placeholder="Gebruikersnaam" id="username" class="form-control" name="email">
          </div>
        </div>
        <div class="form-group">
          <label  class="col-lg-2 control-label" for="password">Wachtwoord</label>
          <div class="col-lg-10">
            <input type="password" placeholder="Wachtwoord" id="password" class="form-control" name="password">
          </div>
      </div>

      </div>
      <div class="modal-footer">
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button class="btn btn-default" type="submit">Inloggen</button>
            </div>
          </div>
      </div>
      </form>      
  </div>
</div>



