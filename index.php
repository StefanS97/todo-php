<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<title>To Do's</title>
</head>
<body>

	<div class="container">

    <div class="row mt-3">

        <!-- Show and add items column -->
        <div class="col-lg-6">
            <h2 style="text-align: center;" class="mb-4">Ongoing:</h2>
                <form method="POST" action="scripts/update.php">
                    <h4><?php 
                        $serv = "127.0.0.1";
                        $user = "root";
                        $pw = "";
                        $db = "list";

                        $conn = new mysqli($serv, $user, $pw, $db);

                        $display = "SELECT * FROM list";
                        $rest = mysqli_query($conn, $display);

                        while ($row = mysqli_fetch_array($rest)){  
                            if ($row['done'] == False){
                                $a = $row['id'];
                                echo "<input type='checkbox' name='checked[]' value='$a'> " . $row['text'] . "<br>";
                            }
                        }

                        $conn->close();
                    ?></h4>
                    <button class="btn btn-success" type="submit" name="complete" id="button-addon2">Complete</button>
                    <button class="btn btn-danger" type="submit" name="discard" id="button-addon2">Discard</button>
                </form>
            <form method='POST' action="scripts/add.php">
                <div class="input-group mb-3 mt-4">
                    <input type="text" class="form-control" name="title" placeholder="Add new item" aria-label="Add new item" aria-describedby="button-addon2" required>
                    <button class="btn btn-primary" type="submit" name="submit" id="button-addon2">Add</button>
                </div>
            </form>
        </div>

        <!-- Completed column -->
        <div class="col-lg-6">
            <h2 class="mb-4 text-center">Completed:</h2>
                    <h4><?php 
                        $serv = "127.0.0.1";
                        $user = "root";
                        $pw = "";
                        $db = "list";

                        $conn = new mysqli($serv, $user, $pw, $db);

                        $display = "SELECT * FROM list";
                        $rest = mysqli_query($conn, $display);

                        while ($row = mysqli_fetch_array($rest)){
                            if ($row['done'] == True){
                                echo $row['text'] . "<br>";
                            }
                        }
                        $conn->close();
                    ?></h4>
                <form method="POST" action="scripts/empty.php">
                    <button class="btn btn-danger" type="submit" name="submit" id="button-addon2">Clear all</button>
                </form>
        </div>

    </div>

</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>