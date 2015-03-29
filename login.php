<?php
	/*Program: login.php
	* Desc: Displays a form for administrators and tutors to sign in.
	*/
?>
<html>

<head>
<title>Log In</title>

<style>
#header {
    background-color:lightgrey;
    color:darkblue;
    text-align:center;
    padding:5px;
}
#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:300px;
    width:100px;
    float:left;
    padding:5px;	      
}
#section {
    background-color:lightgrey
    width:350px;
    float:left;
    padding:10px;	 	 
}
</style>
</head>

<body>

<div id="header">
		<h1>Tutoring Center Log In</h1>
</div>

<div id="nav">
//need if, if else, else logic
	<a href="http://tutorcenter.430projectbank.com/admin.php"> Admin</a><br>
	<a href="http://tutorcenter.430projectbank.com/tutor.php"> Tutor</a><br>
	<a href="http://tutorcenter.430projectbank.com/requesttutor.php"> Student</a><br>
	Calendar<br>
</div>
	
<div id="section">
//need if admin, if else tutor, else student logic
	<h1>Admin/Tutor</h1>
	<form action="action_page.php" method="POST">
	User Name:<br>
	<input type="text" name="username" value="" maxlength="20">
	<br>
	User Password:<br>
	<input type="password" name="password" value="" maxlength="20">
	<br><br>
	<input type="submit" value="Submit">
	</form> 
	
	
	</p>
	<h1>Students</h1>
	<p>Students, please click
	<a href="http://tutorcenter.430projectbank.com/requesttutor.php"> here</a>
	 to schedule tutoring sessions.
	</p>	
</div>
		


</body>
</html>