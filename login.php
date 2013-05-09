<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>Blog-Code</title>
<link href="jquery-mobile/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css"/>
<script src="jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="jquery-mobile/jquery.mobile-1.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
</head> 
<body> 

<div data-role="page" id="page" data-theme="e">
	<div data-role="header">
		<h1>Studia Facile 2.0 </h1>
	</div>
	<div data-role="content">
    <div class="content_wrapper">

	<form class="form-vertical" id="login" method="POST" action="studia_facile2/Checklogin.php" accept-charset="UTF-8">	
    <input required="true" type="text" name="username" id="username">
    <input required="true" type="password" name="password" id="password">
    <input id="loginBtn" type="submit" value="Login">
</form>
	
    <script>
	$(function() {
        $('#loginBtn').click(function(e){
            e.preventDefault();
            $.ajax({
                url: 'login',
                type: 'post',
                dataType: 'json',
                data: $('form#login').serialize(),
                success: function(data) {
                    alert("Logged in"); // <- this would have to be your own way of showing that user is logged in
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseText); // <- same here, your own div, p, span, whatever you wish to use
                }
            });
            return false;
        });
    });
	</script>
		<div data-role="footer">
		<h4>www.test test</h4>
	</div>
</div>
</body>
</html>
