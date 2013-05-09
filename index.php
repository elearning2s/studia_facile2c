<?php
	include('php/connessione_db.php');
	$elenca_materie = mysql_query("SELECT * FROM materie");
?>
<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>Studia Facile 2.0</title>
<link href="jquery-mobile/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css"/>
<script src="jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="jquery-mobile/jquery.mobile-1.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	
	//####### on page load, retrive votes for each content
	$.each( $('.voting_wrapper'), function(){
		
		//retrive unique id from this voting_wrapper element
		var unique_id = $(this).attr("id");
		
		//prepare post content
		post_data = {'unique_id':unique_id, 'vote':'fetch'};
		
		//send our data to "vote_process.php" using jQuery $.post()
		$.post('vote_process.php', post_data,  function(response) {
		
				//retrive votes from server, replace each vote count text
				$('#'+unique_id+' .up_votes').text(response.vote_up); 
				$('#'+unique_id+' .down_votes').text(response.vote_down);
			},'json');
	});

	
	
	//####### on button click, get user vote and send it to vote_process.php using jQuery $.post().
	$(".voting_wrapper .voting_btn").click(function (e) {
	 	
		//get class name (down_button / up_button) of clicked element
		var clicked_button = $(this).children().attr('class');
		
		//get unique ID from voted parent element
		var unique_id 	= $(this).parent().attr("id"); 
		
		if(clicked_button==='down_button') //user disliked the content
		{
			//prepare post content
			post_data = {'unique_id':unique_id, 'vote':'down'};
			
			//send our data to "vote_process.php" using jQuery $.post()
			$.post('vote_process.php', post_data, function(data) {
				
				//replace vote down count text with new values
				$('#'+unique_id+' .down_votes').text(data);
				
				//thank user for the dislike
				alert("Thanks! Each Vote Counts, Even Dislikes!");
				
			}).fail(function(err) { 
			
			//alert user about the HTTP server error
			alert(err.statusText); 
			});
		}
		else if(clicked_button==='up_button') //user liked the content
		{
			//prepare post content
			post_data = {'unique_id':unique_id, 'vote':'up'};
			
			//send our data to "vote_process.php" using jQuery $.post()
			$.post('vote_process.php', post_data, function(data) {
			
				//replace vote up count text with new values
				$('#'+unique_id+' .up_votes').text(data);
				
				//thank user for liking the content
				alert("Thanks! For Liking This Content.");
			}).fail(function(err) { 
			
			//alert user about the HTTP server error
			alert(err.statusText); 
			});
		}
		
	});
	//end 
	
	
	
});


</script>
<style type="text/css">
<!--
.content_wrapper{width:500px;margin-right:auto;margin-left:auto;}
h3{color: #979797;border-bottom: 1px dotted #DDD;font-family: "Trebuchet MS";}

/*voting style */
.voting_wrapper {display:inline-block;margin-left: 20px;}
.voting_wrapper .down_button {background: url(images/thumbs.png) no-repeat;float: left;height: 14px;width: 16px;cursor:pointer;margin-top: 3px;}
.voting_wrapper .down_button:hover {background: url(images/thumbs.png) no-repeat 0px -16px;}
.voting_wrapper .up_button {background: url(images/thumbs.png) no-repeat -16px 0px;float: left;height: 14px;width: 16px;cursor:pointer;}
.voting_wrapper .up_button:hover{background: url(images/thumbs.png) no-repeat -16px -16px;;}
.voting_btn{float:left;margin-right:5px;}
.voting_btn span{font-size: 11px;float: left;margin-left: 3px;}

-->
</style>
</head> 
<body> 

<div data-role="page" id="page" data-theme="e">
	<div data-role="header">
		<h1>Studia Facile 2.0 </h1>
	</div>
	<div data-role="content">
    <div class="content_wrapper">

	<?php
	include('php/connessione_db.php');
	$sql = mysql_query("SELECT *  FROM `corsi` WHERE `id_corsi` = 1");
	$nr = mysql_num_rows($sql); 
	?>
	
	
	    <?php
	if( $nr >0 )
	{
		while( $fila = mysql_fetch_array($sql) )
		{
	?>	
        -------------------------------------------------------------------------------------<br />
        <h3>Corso: <?php echo $fila['argomenti_corso']; ?>
		<!-- voting markup -->
        <div class="voting_wrapper" id="1001">
            <div class="voting_btn">
                <div class="up_button">&nbsp;</div><span class="up_votes">0</span>
            </div>
            <div class="voting_btn">
                <div class="down_button">&nbsp;</div><span class="down_votes">0</span>
            </div>
        </div>
        <!-- voting markup end -->
		</h3>
		
        <p>Descrizione del Corso</p>
        <?php echo $fila['desc_corso']; ?>
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
	

</div>
	
	
	
	
	
	
	
<div class="content_wrapper">
    <h3>My Content Topic
        <!-- voting markup -->
        <div class="voting_wrapper" id="1001">
            <div class="voting_btn">
                <div class="up_button">&nbsp;</div><span class="up_votes">0</span>
            </div>
            <div class="voting_btn">
                <div class="down_button">&nbsp;</div><span class="down_votes">0</span>
            </div>
        </div>
        <!-- voting markup end -->
    </h3>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel leo mauris, eget congue augue. Nulla luctus elit et ante blandit non eleifend massa auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis quam at nunc egestas consequat. Donec pretium enim magna, eget egestas enim. 
    
    
    <h3>My Content Topic 2
        <!-- voting markup -->
        <div class="voting_wrapper" id="1002">
            <div class="voting_btn">
                <div class="up_button">&nbsp;</div><span class="up_votes">0</span>
            </div>
            <div class="voting_btn">
                <div class="down_button">&nbsp;</div><span class="down_votes">0</span>
            </div>
        </div>
        <!-- voting markup end -->
    </h3>
    Praesent fermentum erat mauris, a rutrum eros. Curabitur pellentesque vulputate sapien. In tincidunt est vitae leo rutrum lacinia. Cras id lorem sem, non adipiscing leo. Duis lobortis egestas pellentesque. In blandit tortor at lectus sodales tempor.

    <h3>My Content Topic 2
        <!-- voting markup -->
        <div class="voting_wrapper" id="1003">
            <div class="voting_btn">
                <div class="up_button">&nbsp;</div><span class="up_votes">0</span>
            </div>
            <div class="voting_btn">
                <div class="down_button">&nbsp;</div><span class="down_votes">0</span>
            </div>
        </div>
        <!-- voting markup end -->
    </h3>
    Praesent fermentum erat mauris, a rutrum eros. Curabitur pellentesque vulputate sapien. In tincidunt est vitae leo rutrum lacinia. Cras id lorem sem, non adipiscing leo. Duis lobortis egestas pellentesque. In blandit tortor at lectus sodales tempor.
	
	<?php
	include('php/connessione_db.php');
	$sql = mysql_query("SELECT *  FROM `corsi` WHERE `id` = 2 AND `id_corsi` = 2");
	$nr = mysql_num_rows($sql); 
	?>
	
	
	    <?php
	if( $nr >0 )
	{
		while( $fila = mysql_fetch_array($sql) )
		{
	?>	
        -------------------------------------------------------------------------------------<br />
        <h3>Corso: <?php echo $fila['argomenti_corso']; ?>
		<!-- voting markup -->
        <div class="voting_wrapper" id="1003">
            <div class="voting_btn">
                <div class="up_button">&nbsp;</div><span class="up_votes">0</span>
            </div>
            <div class="voting_btn">
                <div class="down_button">&nbsp;</div><span class="down_votes">0</span>
            </div>
        </div>
        <!-- voting markup end -->
		</h3>
		
        <p>Descrizione del Corso</p>
        <?php echo $fila['desc_corso']; ?>
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
	

</div>

	
		<ul data-role="listview">
        <?php
			while($nome_materia = mysql_fetch_array($elenca_materie))
			{
		?>
			<li><a href="dettagli_materia.php?codS=<?php echo $nome_materia['id_materia']; ?>" data-ajax="false"><?php echo $nome_materia['nome_materia']; ?></a></li>
            
            <li><a href="index_vote_process.php">Vota</a></li>
            <?php } ?>
		</ul>		
	</div>
	<div data-role="footer">
		<h4>www.test test</h4>
	</div>
</div>
</body>
</html>
