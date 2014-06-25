<?php if(Session::has('success')): ?>
  <div class="alert alert-success"><?php echo Session::get('success'); ?></div>
<?php endif; ?>
<?php if(Session::has('warning')): ?>
    <div class="alert alert-danger"><?php echo Session::get('warning'); ?></div>
<?php endif; ?>

<!--
<h2> -- TODO -- </h2>
<pre>
	<h4 style="margin:0px;">Dashboard</h4>
	<font style="color:orange;font-size:15px;">Back-end</font>
	<font style="color:green;">- Dashboard zichtbaar maken</font>
	<font style="color:green;">- Welkomst bericht bij inloggen</font>
        <font style="color:red;">- Info views stylen</font>
	<font style="color:red;">- </font>

	<h4 style="margin:0px;">Gebruikers</h4>
	<font style="color:orange;font-size:15px;">Back-end</font>
	<font style="color:green;">- Gebruikers overzicht</font>
	<font style="color:green;">- Gebruiker toevoegen</font>
	<font style="color:green;">- Gebruiker wijzigen</font>
	<font style="color:green;">- Gebruiker verwijderen</font>
	<font style="color:green;">- Rollen kunnen aanmaken/verwijderen/wijzigen</font>	
	<font style="color:green;">- Rollen toekennen aan gebruikers</font>
	<font style="color:green;">- Flash messages(success, warning, danger)</font>
	<font style="color:green;">- Alleen ingelogd in de back-end kunnen komen</font>


	<font style="color:orange;font-size:15px;">Front-end</font>
	<font style="color:red;">- Formulier registratie klant</font>
	<font style="color:red;">- Code genereren bevestigen via mail</font>
	<font style="color:red;">- Klant kan gegevens wijzigen op de website</font>
	<font style="color:red;">- </font>

        <h4 style="margin:0px;">Leverancieren</h4>
        <font style="color:orange;font-size:15px;">Back-end</font>
        <font style="color:green;">- Leverancieren overzicht</font>
	<font style="color:green;">- Leverancieren toevoegen</font>
	<font style="color:green;">- Leverancieren wijzigen</font>
	<font style="color:green;">- Leverancieren verwijderen</font>
            
	<h4 style="margin:0px;">Ingredienten</h4>
	<font style="color:orange;font-size:15px;">Back-end</font>
	<font style="color:green;">- Ingredienten overzicht</font>
	<font style="color:green;">- Ingredienten toevoegen</font>
	<font style="color:green;">- Ingredienten wijzigen</font>
	<font style="color:green;">- Ingredienten verwijderen</font>
	<font style="color:green;">- Flash messages(success, warning, danger)</font>
	<font style="color:green;">- Leverancier kunnen selecteren bij een ingredient(Eerst leveranciers module bouwen) </font>
	<font style="color:green;">- Bij een ingredient kunnen aangeven of dit ook een product voor op de website kan zijn(checkbox) </font>
        <font style="color:green;">- foto toevoegen</font>

	<font style="color:orange;font-size:15px;">Front-end</font>
	<font style="color:green;">- Ingredienten overzicht</font>

	<h4 style="margin:0px;">Menus</h4>
	<font style="color:orange;font-size:15px;">Back-end</font>
	<font style="color:green;">- Menus overzicht</font>
	<font style="color:green;">- Menus toevoegen</font>
	<font style="color:green;">- Menus wijzigen</font>
	<font style="color:green;">- Menus verwijderen</font>
	<font style="color:green;">- Ingredienten aan een menu toewijzen</font>
	<font style="color:green;">- Flash messages(success, warning, danger)</font>
        <font style="color:green;">- foto toevoegen</font>


	<font style="color:orange;font-size:15px;">Front-end</font>
	<font style="color:red;">- Menu's tonen op de website, met de bijbehorende ingredienten</font>

	<h4 style="margin:0px;">Systeem</h4>
    <font style="color:green;">- Models aangemaakt</font>
    <font style="color:green;">- Nederlandse strftime</font>

</pre>

-->
