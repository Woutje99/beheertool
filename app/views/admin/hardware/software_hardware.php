<?php if(!empty($softwarehardware)): ?>

<div class="row">
  <div class="col-sm-6 col-md-10">
    <div class="thumbnail">
      <div class="caption">
<!--         <h3>Alle software op '<?php //echo $hardwarecomponent->identificationcode; ?>' hardware component</h3> -->
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Identificatiecode</th>
                <th>Beschrijving</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($softwarehardware as $softhard): ?>
            <tr>
                <td><?php echo $softhard->software->name; ?></td>
                <td><?php echo $softhard->software->identificationcode ?></td>
                <td><?php echo $softhard->software->description ?></td>
            </tr>
            <?php endforeach; ?>        
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>

<?php else: ?>
  Er is geen software geinstalleerd op dit hardware component
<?php endif;?>