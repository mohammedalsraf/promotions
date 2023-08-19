<?php

    include("conn.php");
    ////////////////////////////// GET DEP
$jdQuery = "SELECT id, jd FROM jd"; 
$result = $conn->query($jdQuery);

// Check if data was fetched successfully
$jd = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $jd[] = $row;
    }
}
//////////////////////////////////////////////////////// end of get Dep





?>