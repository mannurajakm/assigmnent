<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Change Password</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
    $username = mysqli_real_escape_string($con,$username);
    $oldpass = stripslashes($_REQUEST['oldpass']);
    $oldpass = mysqli_real_escape_string($con,$oldpass);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE password='".sha1($oldpass)."'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
        if($rows){
            //$password=rand();
            $query = "UPDATE users SET password='".sha1($password)."' WHERE username='".$username."'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    echo $result; 
    if($result){
            echo "<div class='form'>
<h3>UPDATE successfully.</h3>
<br/>Click here to <a href='index.php'>Back</a></div>";
}else{
    echo "<div class='form'>
<h3>Worng Username</h3>
<br/>Click here to <a href='index.php'>Back</a></div>"; 
}
        }
        else{
           echo "<div class='form'>
<h3>Worng Old password</h3>
<br/>Click here to <a href='index.php'>Back</a></div>"; 
        }
    }else{
?>
<div class="form">
<h1>Change Password</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="mobile" name="oldpass" placeholder="Old Password" required />
<input type="password" name="password" placeholder="Newpassword" required />
<input type="submit" name="submit" value="Change Password" />
</form>
</div>
<?php } ?>
</body>
</html>