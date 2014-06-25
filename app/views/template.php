<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo Request::root(); ?>/">Scholengemeenschap de Hondsrug</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> Incidenten<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo request::root(); ?>/incident/aanmaken"><i class="fa fa-plus"></i> Aanmaken</a></li>        
        </ul>
      </li>

           <?php if(Auth::check()): ?>
                  <li><a href="<?php echo Request::root(); ?>/account">Account</a></li>
                <?php endif; ?>

                <?php if(Auth::check()): ?>
                  <li><a href="<?php echo Request::root(); ?>/uitloggen">Uitloggen</a></li>
                <?php endif; ?>
                
                <?php if(Auth::guest()): ?>
                  <li><a href="<?php echo Request::root(); ?>/login">Inloggen</a></li>
                <?php endif; ?>
                
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>

<div class="container">
    <div class="page-header">
        <h3><?php echo $title;?></h3>
    </div>
    <?php echo $content;?>
</div>

