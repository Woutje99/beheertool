<?php if(Session::has('success')): ?>
  <div class="alert alert-success"><?php echo Session::get('success'); ?></div>
<?php endif; ?>

<div class="row">

  <div class="col-sm- col-md-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>Gebruiker gegevens</h3>
        <table class="table table-striped">
        <tbody>
        <tr>
            <td><?php $user = User::find($incident->users_id); echo $user->firstname . ' ' . $user->lastname; ?></td>
        </tr> 
        <tr>
            <td><?php echo $user->address .' '. $user->housenumber; ?></td>
        </tr>
        <tr>
            <td><?php echo $user->zipcode .' '. $user->city; ?></td>
        </tr>
        </tbody>
        </table>
      </div>
      <div class="caption">
        <h3>Status incident</h3>
        <table class="table table-striped">
        <tbody>
        <tr>
            <td>Huidige status: </td>
            <td><?php echo $incident->status; ?></td>
        </tr>
        <tr>
          <td>Classificiatie</td>
          <td>
            <div class="form-group">
<!--         <label for="selectRoles" class="col-lg-2 control-label">Locaties</label>
 -->        <div class="col-lg-10">
        <?php
            $selected = $incident->classification;
        ?>
        <form method="POST" action="<?php echo Request::root(); ?>/admin/incidents/classifications/<?php echo $incident->id; ?>" >
        <select id="selectLocation" class="form-control" name="classification">
        <?php foreach(Incident::classifications() as $key => $value): ?>
            <option value="<?php echo $key ?>"<?php if($selected == $key) echo 'selected'; ?>><?php echo $value; ?></option>
        <?php endforeach; ?>
        </select>
                        <input type="submit" name="submit" value="Wijzigen" class="btn btn-primary" />

        </div>
    </div>
          </td>
        </tr> 
        <tr>
            <td>Communiceren met gebruiker: </td>
            <td><a href="<?php echo Request::root(); ?>/admin/incidents/messages/<?php echo $incident->id; ?>">Communicatie met gebruiker</a></td>
        </tr> 
        <?php if(!($incident->status === 'Afgehandeld')): ?>
        <tr>
            <td>Status wijzigen: </td>
            <td>
            <form method="POST">
              <?php
              $statussen = array('Incident aangemaakt', 'In behandeling', 'Afgehandeld');
              $huidigeStatus = $incident->status;
              $volgendeStatus = $statussen[array_search($huidigeStatus, $statussen) + 1]
              ?>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="status" value="<?php echo $volgendeStatus; ?>" /> <?php echo $volgendeStatus; ?>
                </label>
              </div>
                <input type="submit" name="submit" value="Wijzigen" class="btn btn-primary" />
            </form>
            </td>
        </tr> 
        <?php endif; ?>
        </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-8">
    <div class="thumbnail">
      <div class="caption">
        <h3>Incident</h3>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Identificatiecode/Hardware-id</th>
                <th>Locatie</th>
                <th>Incident aangemaakt op</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td><a href="<?php echo Request::root(); ?>/admin/hardware/software/<?php echo $incident->hardware->id; ?>"><?php echo $incident->hardware->identificationcode; ?></a></td>
                <td><?php echo $incident->hardware->location->name; ?></td>
                <td><?php echo $incident->created_at; ?></td>
            </tr>
            <tr>
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
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-md-10">
    <div class="thumbnail">
      <div class="caption">
        <h3>Vragen en Antwoorden vragenscript:</h3>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Vraag</th>
                <th>Antwoord</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($answerquestions as $aq): ?>
            <tr>
                <td><?php echo $aq->question->title; ?></td>
                <td><?php echo $aq->answer->name; ?></td>
            </tr>
            <?php endforeach; ?>        
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<?php if($incidents->count() > 1): ?>
<div class="row">
  <div class="col-sm-6 col-md-10">
    <div class="thumbnail">
      <div class="caption">
        <h3>Alle incidenten van '<?php echo $user->firstname . ' ' . $user->lastname ; ?>'</h3>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Incidentnummer</th>
                <th>Status</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($incidents as $item): ?>
            <?php if($incident->id === $item->id) { continue; } ?>
            <tr>
                <td><?php echo $item->id; ?></td>
                <td><?php echo $item->status; ?></td>
                <td>
                    <a href="<?php echo Request::root(); ?>/admin/incidents/edit/<?php echo $item->id ?>"><i class="icon-edit"></i> Bekijken </a>
                <td>
            </tr>
            <?php endforeach; ?>        
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>