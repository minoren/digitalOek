<?php
error_reporting(E_ALL);
$db = pg_connect("host=127.0.0.1 dbname=digitalOe user=postgres ") or die('Could not connect: ' . pg_last_error());
?>
<?php
session_start();
?>


<html> 
<head> 
	
	 <head>
      <title>Anmelden</title>
      <meta name="author" content="Renata Minorczyk Matr.Nr.0006750">
      <meta name="editor" content="">
      <link rel="stylesheet" type="text/css" href="css/main.css" />
	  <link rel="stylesheet" type="text/css" href="css/style.css"> 
   </head>
	
</head> 
<body> 
  
	<div id="container"> 
	
	
	<div id="header"> 
	<h1>Med-Fit Solution</h1>

	</div> 
	<div id="navigation">
	
		<ul id = "nav">
		
		    <li id="active"> <a href="startseite.php" title="Artikel">Artikel</a></li>
			<li><a href="warenkorb.php"title="Warenkorb">Warenkorb</a></li>
			<li><a href="registrieren.php"title="Registrieren">Registrieren</a></li>
			<li><a href="anmelden.php"title="Anmelden">Anmelden</a></li>
		</ul>
	</div>
	
	
	<div id="main"> 
	

	<?php
$email = isset($_POST['email']);
$password = isset($_POST['password']);

if ($email != '' && $password != '')
	{
	$db = pg_connect("host=127.0.0.1 dbname=digitalOe user=postgres ") or die('Could not connect: ' . pg_last_error());
	$result = pg_query("SELECT email, password FROM kunde");
	$end = 0;
	while (($row = pg_fetch_row($result)) && ($end == 0))
		{
		if ($row[0] == $email && $row[1] == $password)
			{
			
			$_SESSION['eingeloggt'] = "2";
			$_SESSION['email'] = $email;
			print "<head><title>Kundenseite</title></head>";
			$end = 1;
			break;
			}
		}

	if ($end == 0)
		{
		print "<head><title>Fehler beim einloggen</title></head>";
		}
	}
  else
	{
	print "<head><title>Fehler beim einloggen</title></head>";
	}

?>


<form action ="anmelden.php" method = "post">
<table align="center">
<tr> <td> <font size=4>email </font> </td> <td> <input type=text name = "email"></td>
<tr> <td> <font size=4>Passwort </font> </td> <td> <input type=password name = "password"></td>
<tr><td>&nbsp</td></tr>
<tr><td>&nbsp</td><td align="center"><input type = "submit" value="login"></td> </tr>

</table>
</form>

<br />
	
	
		</div> 

</body> 
</html>
