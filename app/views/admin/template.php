<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo Request::root(); ?>/admin/dashboard">Scholengemeenschap de Hondsrug</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="<?php echo request::root(); ?>/admin/dashboard"><i class="fa fa-tachometer"></i> Dashboard</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Gebruikers<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo request::root(); ?>/admin/users"><i class="fa fa-reorder"></i> Overzicht</a></li>
          <li><a href="<?php echo request::root() ?>/admin/users/edit"><i class="fa fa-plus"></i> Toevoegen</a></li>
          <li><a href="<?php echo request::root() ?>/admin/roles"><i class="fa fa-shield"></i> Rollen</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cube"></i> Incidenten<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo request::root(); ?>/admin/incidents"><i class="fa fa-reorder"></i> Overzicht</a></li>        
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-database"></i> Hardware & Software<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo request::root(); ?>/admin/hardware"><i class="fa fa-reorder"></i> Hardware overzicht</a></li> 
          <li><a href="<?php echo request::root() ?>/admin/hardware/edit"><i class="fa fa-plus"></i> Hardware toevoegen</a></li> 
          <li><a href="<?php echo request::root(); ?>/admin/software"><i class="fa fa-reorder"></i> Software overzicht</a></li> 
          <li><a href="<?php echo request::root() ?>/admin/software/edit"><i class="fa fa-plus"></i> Software toevoegen</a></li>       
        </ul>
      </li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-question"></i> Vragen<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo request::root(); ?>/admin/questions"><i class="fa fa-reorder"></i> Overzicht</a></li>
          <li><a href="<?php echo request::root() ?>/admin/questions/edit"><i class="fa fa-plus"></i> Toevoegen</a></li>
          <li><a href="<?php echo request::root() ?>/admin/questions/sort"><i class="fa fa-sort"></i> Sorteren</a></li>
        </ul>
      </li>
      <li><a href="<?php echo Request::root(); ?>/admin/logout"><i class="icon-off"></i> Uitloggen</a></li>
    </ul>
   <!--  <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form> -->
    </div><!-- /.navbar-collapse -->
</nav>

<div class="container">
    <div class="page-header">
        <h3><?php echo $title;?></h3>
    </div>
    <?php echo $content;?>
</div>

