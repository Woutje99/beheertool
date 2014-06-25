<div class="row">

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>Account gegevens</h3>
        <p>Naam: <?php echo $user->firstname .' '. $user->lastname; ?></p>
        <p>Adres & Huisnummer : <?php echo $user->address .' '. $user->housenumber; ?></p>
        <p>Postcode & Plaats: <?php echo $user->zipcode .' '. $user->city; ?></p>
        <p>Email: <?php echo $user->email; ?></p>
        <p><a href="<?php echo Request::root(); ?>/account/wijzigen" class="btn">Bewerken</a> </p>
      </div>
    </div>
</div>
<div class="row">
  <div class="col-sm-6 col-md-8">
    <div class="thumbnail">
      <div class="caption">
        <h3>Incidenten</h3>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Incidentnummer</th>
                <th>Aanmaak datum</th>
                <th>Status</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($incidents as $incident): ?>
            <tr>
                <td><?php echo $incident->id; ?></td>
                <td><?php echo $incident->created_at; ?></td>
                <td><?php echo $incident->status; ?></td>
                    <form method="POST" action="<?php echo Request::root(); ?>/account/incident">
                      <input type="hidden" name="incidentid" value="<?php echo $incident->id; ?>"/>
                      <td><button class="btn btn-primary">Bekijken </button></td>
                    </form>
            </tr>
            <?php endforeach; ?>        
        </tbody>
        </table>
      </div>
    </div>
  </div>

