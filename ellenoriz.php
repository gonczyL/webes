<?php
$servername = "sql108.epizy.com";

$username = "epiz_28557726";
$password = "VcjL8TkOSYsc";
$dbname = "epiz_28557726_phpadatok";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Csatlakozasi hiba: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tabla";
$result = mysqli_query($conn, $sql);


$file = fopen("password.txt", "r") or die("Hianyzik az adatallomany");
$teljesfile=fread($file, filesize("password.txt"));

$password = array(5, -14, 31, -9, 3 );

$x=0;
for($n=0; $n<strlen($teljesfile); $n++) {
		if(ord($teljesfile[$n])==10) {
			$x=0;
			$dekodolt[$n]=" ";
			continue;
		}
		
		
		$dekodolt[$n] = chr(ord($teljesfile[$n]) - $password[$x]);
		
        $x++;
        if ($x == 5) $x = 0;
              
}

$szoveg=implode("", $dekodolt);
$tok = strtok($szoveg, " ");
$jojelszo=0;
$joemail=0;

if (isset($_POST['email']) && isset($_POST['email'])) {
	while ($tok != false && $row = mysqli_fetch_assoc($result)) {
		if(($_POST['email'])==substr($tok, 0, strlen($_POST['email']))) {	
			if (($_POST['jelszo'])==(substr($tok, strlen($_POST['email'])+1, strlen($tok)-strlen($_POST['email'])+1))) {
				if($_POST['email'] != $row['Username']) {
							?>
							<style type="text/css">.hibauser{display:none;}</style>
							<style type="text/css">.hiba{display:none;}</style>
							<?php 
							
						  
						  switch($row["Titkos"]) {
							  case "piros":
								echo "<body style='background: #CC0000;'>";
								break;
							  case "zold":
								echo "<body style='background: #4C9900;'>";
								break;
							  case "kek":
								echo "<body style='background: #0066CC;'>";
								break;
							  case "sarga":
								echo "<body style='background: #FFFF66;'>";
								break;
							  case "fekete":
								echo "<body style='background: black;'>";
								break;
							  case "feher":
								echo "<body style='background: white;'>";
								break;

							 }
						$jojelszo=1;
						$joemail=1;
						break;
				
				}
				
			}
			else {
				$joemail=1;
				$jojelszo=0;
				continue;
			}
		
		}
		else {
			$joemail=0;	
			
		}	
	
	
	$tok = strtok(" ");
	
	}
	if(!$joemail) {
		?>
		<style type="text/css">#username_error{display:block;}</style>
		<style type="text/css">#password_error{display:none;}</style>
		<?php 
	}
	else if($joemail && !$jojelszo) {
		?>
		<meta http-equiv="refresh" content="3;http://www.police.hu" />
		<style type="text/css">#username_error{display:none;}</style>
		<style type="text/css">#password_error{display:block;}</style>
		<?php
	}
	
}

fclose($file);
mysqli_close($conn);
?> 