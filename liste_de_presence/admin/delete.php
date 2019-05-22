<?php

include('../connect2db.php');

if (isset($_POST['delete'])) {

    $delete_query = mysqli_query($conn, "DELETE FROM `simplonien` WHERE 1");

if ($delete_query) {
    header('location: index.php'); 
}
else {
    echo 'Suppression échouée';
}

}


?>