<?php
session_start();
if(isset($_SESSION['username']) && ($_SESSION['username'] == $myusername)){
header("location:main_login.php");
}
?>

<html>
<body>
Login Successful. <a href="logout.php">Logout</a>
</body>
</html>