<?php

$serv = "127.0.0.1";
$user = "root";
$pw = "";
$db = "list";

$conn = new mysqli($serv, $user, $pw, $db);

$txt = $_POST["title"];

$sql = "INSERT INTO list (text, done) VALUES ('$txt', False)";

if (mysqli_query($conn, $sql) === True){
	header('Location: /todo/index.php');
} else {
	echo "failed";
}

$conn->close();

?>