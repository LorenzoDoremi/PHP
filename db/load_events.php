
<?php
require_once "db/config.php";
$id = $_SESSION['id'];
$query = "SELECT * FROM eventi WHERE creatore = $id";
$stmt = "";
// $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($stmt = mysqli_prepare($link, $query)) {

    if (mysqli_stmt_execute($stmt)) {
        /* store result */
       

       
        $result = $stmt->get_result();
        
        echo "<ul>";
        while ($row = $result->fetch_array()) {
          
            echo "<li class=\"event\">".$row['id'] . " " . $row['evento']."</li>";
           
        }
        echo "</ul>";
    } else {

        echo "something went wrong";
    }
} else {
    echo $link->error;
}
?>