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
	Admin<br>
	Tutor<br>
	Calendar<br>
</div>
	
<div id="section">
	<form action="action_page.php" method="GET">
	User Name:<br>
	<input type="text" name="username" value="MyUserName">
	<br>
	User Password:<br>
	<input type="password" name="password" value="MyPassword"
	<br><br>
	<input type="submit" value="Submit">
	</form> 
</div>
		
<p>"***THIS IS JUST A SKELETON FORM TO GET STARTED.*** " Work in progress NEED TO CHANGE:If you click "Submit", the form-data will be sent to a page called "action_page.php".</p>

</body>
</html>