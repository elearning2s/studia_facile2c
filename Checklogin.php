<?php
$host="localhost";
$username="root";
$password="";
$db_name="studia_facile";
$tbl_name="members";


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("Cannot Select Database");

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];


$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);


if($count==1){
   if (user_level == 1) {
        $_SESSION['myusername'] = $myusername;
        $_SESSION['mypassword'] = $mypassword;
        header("location:Admin_home.php");
        }
   else if (user_level == 2) {
        $_SESSION['myusername'] = $myusername;
        $_SESSION['mypassword'] = $mypassword;
        header("location:home.php");
   }
}
else {
echo "Wrong Username or Password";
}
?> 