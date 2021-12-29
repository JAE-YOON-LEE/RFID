<?php
header("Content-Type: text/html;charset=UTF-8");

$mysqli = new mysqli("localhost", "user1", "12345", "pet_guard");

if($mysqli){
    echo "MySQL successfully connected!<br/>";

    $temp = $_GET['temp'];

    echo "<br/>Temperature = $temp";

    $query = "UPDATE members set last_position='YNC디컨실' where tag_name='$temp'";
    mysqli_query($mysqli,$query);




    echo "</br>success!!";
} else{
    echo "MySQL could not be connected";
    }

    mysqli_close($mysqli);

    ?>
