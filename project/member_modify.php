<?php
    $id = $_GET["id"];

    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];
    $type  = $_POST["type"];
    $tag_name  = $_POST["tag_name"];

    $email = $email1."@".$email2;

    $con = mysqli_connect("localhost", "user1", "12345", "pet_guard");
    $sql = "update members set pass='$pass', name='$name' , email='$email', type='$type', tag_name='$tag_name' ";
    $sql .= " where id='$id'";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>