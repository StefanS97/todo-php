<?php
$serv = "127.0.0.1";
$user = "root";
$pw = "";
$db = "list";

$conn = new mysqli($serv, $user, $pw, $db);


if (isset($_POST['checked']) and isset($_POST['complete'])) {
	foreach ($_POST['checked'] as $p) {
		$db = "SELECT * FROM list";
		$fetch = mysqli_query($conn, $db);
		$r = mysqli_fetch_array($fetch);
		$sql = "UPDATE list SET done=1 WHERE id=$p";
		$conn->query($sql);
		header("Location: /todo/index.php");
	}
} elseif (isset($_POST['checked']) and isset($_POST['discard'])) {
	foreach ($_POST['checked'] as $p) {
		$db = "SELECT * FROM list";
		$fetch = mysqli_query($conn, $db);
		$r = mysqli_fetch_array($fetch);
		$sql = "DELETE FROM list WHERE id=$p";
		$conn->query($sql);
		header("Location: /todo/index.php");
	}
} else {
	header("Location: /todo/index.php");
}

$conn->close();

?>