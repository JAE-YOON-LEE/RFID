<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];
    $type  = $_POST["type"];
    $tag_name  = $_POST["tag_name"];

    $email = $email1."@".$email2;


    $con = mysqli_connect("localhost", "user1", "12345", "pet_guard");

	$sql = "insert into members(id, pass, name, email, type, tag_name, state, level, last_position) ";
	$sql .= "values('$id', '$pass', '$name', '$email', '$type', '$tag_name', 'O', 9,'NO_CHECK')";

	mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>
