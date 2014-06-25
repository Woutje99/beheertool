<?php if($errors->count() > 0 ): ?>
    <div class="alert alert-danger">
        <?php foreach($errors->all() as $message): ?>
            - <?php echo $message ?> <br />
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<?php if(!empty($incidentmessages)): ?>



    <table class="table table-striped">
    <thead>
        <tr>
            <th>Bericht</th>
            <th>Aangemaakt op</th>
            <th>Gebruiker</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($incidentmessages as $item): ?>
        <tr>
            <td width="700px"><?php echo $item->message; ?></td>
            <td><?php echo $item->created_at; ?></td>
            <td>
                <?php if($item->user->hasRole('Admin')): ?>
                <?php echo $item->user->firstname . ' ' . $item->user->lastname; ?>
            <?php else: ?>
                <?php echo $item->user->firstname . ' ' . $item->user->lastname; ?>
            <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>        
    </tbody>
</table>

<?php else: ?>
    Er zijn nog geen incident berichten verstuurd
<?php endif;?>


<form class="form-horizontal" role="form" method="POST">
   
    <?php echo Form::token(); ?>
   
<div class="row">
      <label class="col-xs-12" for="TextArea">Bericht</label>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <textarea class="form-control" name="message" id="TextArea" rows="5" cols="30" style="width:50%;"></textarea>
      </div>
    </div>
    </div>
</br>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-10">
            <button type="submit" class="btn btn-default">Versturen <i class="icon-save"></i></button>
        </div>
    </div>
</form>

