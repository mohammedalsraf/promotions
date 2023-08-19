<?php

    include("conn.php");
    ////////////////////////////// GET DEP
$ctQuery = "SELECT id, ct FROM ct"; 
$result = $conn->query($ctQuery);

// Check if data was fetched successfully
$ct = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $ct[] = $row;
    }
}
//////////////////////////////////////////////////////// end of get Dep





?>