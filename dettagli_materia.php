<?php
	include('php/connessione_db.php');
	$myIdS = $_GET['codS'];
	$sql = mysql_query("SELECT * FROM corsi WHERE id_corsi = '$myIdS'");
	$nr = mysql_num_rows($sql);
?>

<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>Blog-Code</title>
<link href="jquery-mobile/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css"/>
<script src="jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="jquery-mobile/jquery.mobile-1.0.min.js" type="text/javascript"></script>
</head> 
<body> 

<div data-role="page" id="page">
	<div data-role="header">
		<h1>Lista dei Corsi per Materia</h1>
	</div>
	<div data-role="content" align="center">
    <?php
	if( $nr >0 )
	{
		while( $fila = mysql_fetch_array($sql) )
		{
	?>	
     <a href="#" data-icon="back" data-rel="back" title="Torna indietro">Indietro</a>
        <br>
      -------------------------------------------------------------------------------------<br />
        <h2>Corso: <?php echo $fila['argomenti_corso']; ?></h2>
        <h4>Descrizione del Corso</h4>
        <p><?php echo $fila['desc_corso']; ?>
        <br />
       Prezzo € <?php echo $fila['prezzo']; ?>
        <br />		
        <?php } 
	}
	else
	{
		echo "<h2>"."Niente per la materia selezionata..."."</h2>";
	}
		?>
        -------------------------------------------------------------------------------------
	    </p>
      
	</div>
	<div data-role="footer">
		<h4>www.</h4>
	</div>
</div>
</body>
</html>
