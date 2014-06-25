<?php if(Session::has('success')): ?>
  <div class="alert alert-success"><?php echo Session::get('success'); ?></div>
<?php endif; ?>
<?php if(Session::has('warning')): ?>
    <div class="alert alert-danger"><?php echo Session::get('warning'); ?></div>
<?php endif; ?>

Welkom bij de beheertool van Scholengemeenschap de Hondsrug