<?php 
$serv = "127.0.0.1";
$user = "root";
$pw = "";
$db = "list";

$conn = new mysqli($serv, $user, $pw, $db);

$display = "SELECT * FROM list";
$rest = mysqli_query($conn, $display);

while ($row = mysqli_fetch_array($rest)){
	if ($row['done'] == True){
		$sql = "DELETE FROM list WHERE done=1";
		$removed = mysqli_query($conn, $sql);
	}
}

header("Location: /todo/index.php");

$conn->close();
?>