 <table class="table table-striped">
        <thead>
            <tr>
                <th>Identificatiecode/Hardware-id</th>
                <th>Locatie</th>
                <th>Incident aangemakt op:</th>                 
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $incident->hardware->identificationcode; ?></td>
                <td><?php echo $incident->hardware->location->name; ?></td>
                <td><?php echo $incident->created_at; ?></td>
                <td><?php echo $incident->status; ?></td>
                
            </tr>
            <tr>
                <td>
                    <div class="row">
      <label class="col-xs-12" for="TextArea">Beschrijving incident</label>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <textarea class="form-control" name="message" id="TextArea" rows="10    " cols="30" style="width:100%;"><?php echo $incident->description; ?></textarea>
      </div>
    </div>
</div>
                </td>
            </tr>
        </tbody>


</table>



<?php if(!empty($incidentmessages)): ?>

<h3>Berichten over het incident</h3>

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
                <?php echo $item->user->firstname . ' ' . $item->user->lastname; ?>
            </td>
        </tr>
        <?php endforeach; ?>        
    </tbody>
</table>

<?php else: ?>
    Er zijn nog geen incident berichten verstuurd
<?php endif;?>

<form method="POST" action="<?php echo Request::root(); ?>/account/incident/bericht">
   
    <?php echo Form::token(); ?>
    <?php //echo Form::hidden('id', $hardware->id); ?>
    <input type="hidden" name="incidentid" value="<?php echo $incident->id; ?>"/>

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
