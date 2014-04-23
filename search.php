<html>
<head><title>Siri Automation</title></head>
<body>
<h1>
<?php
error_reporting(E_ALL|E_STRICT);

ini_set('display_errors', 1);

// get keyword

$keyword = strtolower($_GET["p"]);
$part = explode(" ", $keyword);
//echo "Part 0 ".$part[0]."<br>"; // Teil1
//echo "Part 1 ".$part[1]."<br>"; // Teil2
//echo "Part 2 ".$part[2]."<br>"; // Teil2
if($part[0] == "mach" ) {

	if($part[1] == "test") {
		echo "It's working";
		echo "<br><br>";
	}
   
   else if($part[1] == "tv") {
   	
		if($part[2] == "an") { echo "Turning TV on..."; shell_exec("sudo pilight-send -p pollin -s 31 -u 1 -t"); }
		if($part[2] == "aus") { echo "Turning TV off..."; shell_exec("sudo pilight-send -p pollin -s 31 -u 1 -f"); }		
		echo "<br><br>";
	}
   else if($part[1] == "sound") {
   	
		if($part[2] == "an") { echo "Turning Sound on..."; shell_exec("sudo pilight-send -p pollin -s 31 -u 8 -t"); }
		if($part[2] == "aus") { echo "Turning Sound off..."; shell_exec("sudo pilight-send -p pollin -s 31 -u 8 -f"); }		
		echo "<br><br>";
	}
   else if($part[1] == "alles") {
   	
		if($part[2] == "aus") { 
		echo "Turning All off..."; 
		shell_exec("sudo pilight-send -p pollin -s 31 -u 1 -f"); // TV
		shell_exec("sudo pilight-send -p pollin -s 31 -u 8 -f"); // Sound
		shell_exec("sudo pilight-send -p pollin -s 31 -u 2 -f"); // Bad Radio
		shell_exec("sudo pilight-send -p rev_switch -i 60 -u A2 -f"); // Sofa Lampe
		shell_exec("sudo pilight-send -p rev_switch -i 60 -u C3 -f"); // Schreibtisch Lampe
		shell_exec("sudo pilight-send -p rev_switch -i 60 -u B1 -f"); // TV Lampe
		 }		
		echo "<br><br>";
	}

else {
echo "Command not recognized: ". $part[1];
echo "<br> Commands: <br>";
echo "Test <br>";
echo "TV an/aus <br>";
echo "Sound an/aus <br>";
echo "Alles aus <br>";

}
}
else {
	header('Location: https://search.yahoo.com/search?p=' . $keyword);
}
?>
</h1>
</body>
</html>
