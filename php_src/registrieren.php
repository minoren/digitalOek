<html>
<head><title>Registrieren</title></head>
<body>



<?php

session_start();
$erfolg=FALSE;

if (isset($_POST['email']))
{
  $anrede=$_POST['anrede'];
  $vorname=$_POST['vorname'];
  $nachname=$_POST['nachname'];
  $email=$_POST['email'];
  $telefon=$_POST['telefon'];
  $password=$_POST['password'];	
  $gebdatum=$_POST['gebdatum'];
  $bank=$_POST['bank'];

  $ort=$_POST['ort'];
  $strasse=$_POST['strasse'];
  $hnummer=$_POST['hnummer'];
  $plz=$_POST['plz'];
  $land=$_POST['land'];
  
  $ust_id=$_POST['ust_id'];
  $firmenname=$_POST['firmenname'];
  
 error_reporting(E_ALL);
   
   $db = pg_connect("host=127.0.0.1 dbname=digitalOe user=postgres ")
       or die('Could not connect: ' . pg_last_error());

	$result = pg_query("SELECT email FROM kunde");
	$end=0;
	while( ($row = pg_fetch_row($result)) && ($end==0) ) {
		if ($row[0]==$email) 
		$end=1;
	}

	if ($end==0)
	{
		$query1="INSERT into kunde (anrede,vorname,nachname,email,telefon,password,gebdatum,bank) values('$anrede','$vorname','$nachname','$email','$telefon','$password','$gebdatum','$bank')";
		$query2="INSERT into adresse (ort,strasse,hnummer,plz,land) values('$ort','$strasse','$hnummer', '$plz','$land')";
		$query3="INSERT into businesskunde (ust_id,firmenname) values('$ust_id','$firmenname')";

		pg_query($db, $query1);		
		
		pg_query($db, $query2);	
        pg_query($db, $query3);		
    
    

	}
	 else {
		print"<br><fontsize=4>Dieser Kunde ist schon registriert ist schon registriert</font><br>";	
		print"<h1>W&auml;hlen Sie eine neue email</h1><br>";	
	}
if ($erfolg==FALSE)
{
	print "<form action =\"registrieren.php\" method = \"post\">";
	print "<table>";
	

	print "<tr> <td> Anrede </td>"; 
	print "<td><SELECT name=anrede>";
	if ($anrede==1) {
		print "<OPTION value=\"1\">Frau";
		print "<OPTION value=\"0\">Herr";
	}
	else {
		print "<OPTION value=\"1\">Herr";
		print "<OPTION value=\"0\" selected>Frau";
	}
	print "</SELECT></td>";
	print "</tr>";
	
		
	print "<tr> <td> vorname  </td> <td><input type=text name = \"vorname\" value=\"". $vorname ."\"></td>";
	print "<tr> <td> nachname </td> <td><input type=text name = \"nachname\" value=\"". $nachname ."\"></td>";
	print "<tr> <td> email  </td> <td><input type=text name = \"email\" value=\"". $email ."\"></td>";
	print "<tr> <td> telefon </td> <td><input type=text name = \"telefon\" value=\"". $telefon ."\"></td></tr>";	
	print "<tr> <td> password </td> <td><input type=text name = \"password\" value=\"". $password ."\"></td></tr>";
	print "<tr> <td> gebdatum </td> <td><input type=text name = \"gebdatum\" value=\"". $gebdatum ."\"></td></tr>";
	print "<tr> <td> bank </td>";
	print "<TEXTAREA wrap=\"virtual\" name=\"bank\" rows=5>";
	print $bank . "</TEXTAREA>";
	print "<tr><td>&nbsp</td></tr>";

	
	   $kunden_id = "SELECT kunden_id FROM kunde";
	   
       $query22 = "UPDATE adresse SET kunden_id =  '. $kunden_id .'";
       var_dump($kunden_id);
	
	print "<tr> <td> ort  </td> <td><input type=text name = \"ort\" value=\"". $ort ."\"></td>";
	print "<tr> <td> strasse </td> <td><input type=text name = \"strasse\" value=\"". $strasse ."\"></td>";
	print "<tr> <td> hnummer  </td> <td><input type=text name = \"hnummer\" value=\"". $hnummer ."\"></td>";
    print "<tr> <td> plz  </td> <td><input type=text name = \"plz\" value=\"". $plz ."\"></td>";
	print "<tr> <td> land</td> <td><input type=text name = \"land\" value=\"". $land ."\"> </td></tr>";
	print "<tr> <td> kunden_id</td> <td><input type=text name = \"kunden_id\" value=\"". $kunden_id ."\"> </td></tr>";
	
	print "<tr> <td> ust_id  </td> <td><input type=text name = \"ust_id\" value=\"". $ust_id ."\"></td>";
	print "<tr> <td> firmenname </td> <td><input type=text name = \"firmenname\" value=\"". $firmenname ."\"></td>";
	print "<tr> <td> kunden_id</td> <td><input type=text name = \"kunden_id\" value=\"". $kunden_id ."\"> </td></tr>";
	

	print "<tr> <td><input type = \"submit\" value=\"Registrieren\"></td>"; 
	print "<td> <input type = \"reset\"></td></tr>";
	print "</table></form>";


}


}


else
{

?>

<h3>Registrieren</h3> <br>
<form action ="registrieren.php" method = "post">
<table>
<tr> <td> Anrede </td> 
<td><SELECT name=anrede>
<OPTION value="1">Frau
<OPTION value="0">Herr
</SELECT></td></tr>

<tr> <td> vorname  </td> <td><input type=text name = "vorname"></td>
<tr> <td> nachname </td> <td><input type=text name = "nachname"></td>
<tr> <td> email </td> <td><input type=text name = "email"></td></tr>
<tr> <td> telefon </td> <td><input type=text name = "telefon"> </td></tr>

<tr> <td> password  </td> <td><input type=password name = "password"></td>
<tr> <td> gebdatum </td> <td><input type=text name = "gebdatum"></td>
<tr> <td> bank </td> <td><input type=text name = "bank"></td></tr>
<tr> <td>
<TEXTAREA name="bank" rows=5>
KontoNr:
BLZ:
IBAN:
</TEXTAREA>

<tr> <td> ort </td> <td><input type=text name = "ort"></td> </tr>
<tr> <td> strasse </td> <td><input type=text name = "strasse"></td></tr>
<tr> <td> hnummer </td> <td><input type=text name = "hnummer"></td></tr>
<tr> <td> plz </td> <td><input type=text name = "plz"></td></tr>
<tr> <td> land </td> <td><input type=text name = "land"></td></tr>

<tr> <td> ust_id </td> <td><input type=text name = "ust_id"></td></tr>
<tr> <td> firmenname </td> <td><input type=text name = "firmenname"></td></tr>

<tr><td>&nbsp</td></tr>
<tr><td><input type = "submit" value="Registrieren"></td> 
<td><input type = "reset"></td></tr>
</table>
</form>
<br>

<?php


}

if (isset($_SESSION['eingeloggt']) && $_SESSION['eingeloggt']==1)
print "<center><a href=\"admin.php\">zur&uuml;ck zur ADMIN-Panel</a></center><br>";
else
print "<center><a href=\"index.html\">zur&uuml;ck zur Startseite</a></center>";

?>





<br>

</body>
</html>

