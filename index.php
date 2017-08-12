<?php
	include("config.php"); 
	
	// connect to the mysql server
	$link = mysql_connect($db_host, $db_user, $db_pass)
	or die ("Could not connect to mysql because ".mysql_error());
	
	// select the database
	mysql_select_db($db_name)
	or die ("Could not select database because ".mysql_error());

	if (isset($_POST['btnsubmit'])) {
        $match = "select id from usertbl where username = '".$_POST['username']."'
		and pass = '".$_POST['password']."';"; 

		$qry = mysql_query($match)
		or die ("Could not match data because ".mysql_error());
		
		$num_rows = mysql_num_rows($qry); 
		
		if ($num_rows <= 0) {
			$username = $_POST['username'];
			echo "Sorry, there is no username $username with the specified password.<br>";
			echo "<a href=index.php>Try again</a>";
			exit; 
		} else {
			header('Location: home.php' );
		}
    }
	
?>

<!--
All eode is under the GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007.
-->
<!DOCTYPE html>
<html>
<head>
<!-- Page Title -->
<title>Login | WebSiteName</title>
<!-- Import Bootstrap from CDN-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!--Extra Theme-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!--Import jQuary from CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Extra CSS -->
<style>
.text-center {
  text-align: center;
}
body {
  margin-top: 100px;
  background: #16a085;
}
</style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="panel panel-primary">
        <div class="panel-heading text-center"><h4>Login</h4></div>
		<div class="panel-body">
		<form action="index.php" method="post">
          <div class="form-group">
            <label for="usr">Username:</label>
            <input type="text" name="username" placeholder="Username" class="form-control" id="username">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" placeholder="Password" class="form-control" id="password">
          </div>
        <input type="submit" class="btn btn-primary" value="Login" name='btnsubmit' id='btnsubmit'><p style="float: right;">Don't have an account? <a href="register.html">Register!</a></p>
        </form>

		</div>
		<div class="panel-footer">Copyright &copy; <a href="#">YOU</a> 2016, All Rights Reserved.</br> Login & Register Template by <a href="https://github.com/JoeZwet">Joe Zwet</a>.</div>
      </div>
    </div>
  </div>
</div>
</body>
</html>