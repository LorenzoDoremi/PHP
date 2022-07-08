
<?php
require_once "db/config.php";

$query = "SELECT eventi.id, evento, nickname FROM eventi, membri WHERE eventi.creatore = membri.id";
$stmt = "";
// $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($stmt = mysqli_prepare($link, $query)) {

    if (mysqli_stmt_execute($stmt)) {
        /* store result */
       

       
        $result = $stmt->get_result();
     
        echo "<ul id=\"events\">";
        while ($row = $result->fetch_array()) {
          
            echo "<li class=\"event\"> 
              <span class=\"ev-id\">".$row['id'] . "</span>".
              "<span class=\"ev-id\">".$row['evento'] . "</span>".
              "<span class=\"ev-id\">".$row['nickname'] . "</span>";
           
        }
        echo "</ul>";
    } else {

        echo "something went wrong";
    }
} else {
    echo $link->error;
}
?>