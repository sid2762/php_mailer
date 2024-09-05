<!-- Code to display data from my database -->

<?php

require "db_connect.php";

echo "Success in connecting to database";

$sql = "select * from `firstForm`.`test`";
$result = mysqli_query($con, $sql);

echo "<br>";

echo mysqli_num_rows($result);

// if(mysqli_num_rows($result)>0){
//     echo "<br>";
//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row);
//     echo "<br>";
//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row);
//     echo "<br>";
//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row);
//     echo "<br>";
//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row);
//     echo "<br>";
//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row);
//     echo "<br>";
//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row);

//     echo "<br>";
//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row);echo "<br>";
//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row);echo "<br>";
//     $row = mysqli_fetch_assoc($result);
//     echo var_dump($row);
// }

while ($row = mysqli_fetch_assoc($result)) {
    echo "<br>";
    // $row = mysqli_fetch_assoc($result);
    // echo var_dump($row);

    echo "Welcome ". $row['firstname']." ".$row['lastname'];
}

?>