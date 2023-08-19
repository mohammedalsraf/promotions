<?php
include("conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $archNumber = $_POST['archNumber'];
        $recordNumber = $_POST['recordNumber'];
        $empName = $_POST['empName'];
        $gander = $_POST['gander'];
        $service = $_POST['service'];
        $jdchos = $_POST['jd'];
        $ctchos = $_POST['ct'];
        $empJopPos = $_POST['empJopPos'];
        $degree = $_POST['degree'];
        $stage = $_POST['stage'];
        $currentSalary = $_POST['currentSalary'];
        $lastAlawaDate = $_POST['lastAlawaDate'];
        $thanksDetails = $_POST['thanksDetails'];
        $oqobatDetails = $_POST['oqobatDetails'];
        $thanks = $_POST['thanks'];
        $oqobat = $_POST['oqobat'];
        $newAlawa = $_POST['newAlawa'];
        $lastTarfee = $_POST['lastTarfee'];
        $asgria = $_POST['asgria'];
        $thanksT = $_POST['thanksT'];
        $oqobatT = $_POST['oqobatT'];
        $newTarfee = $_POST['newTarfee'];
        $newSalary = $_POST['newSalary'];
        $startDate = $_POST['startDate'];
        $towld = $_POST['towld'];
        $taqadDate = $_POST['taqadDate'];
        $notes = $_POST['notes'];
        // Query the database to get sallary 
        $query = "SELECT salary FROM salary WHERE degree = '$degree' AND stage = '$stage'";
        $result = mysqli_query($conn, $query);
        // Display the result in the output field
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $thesalary = $row['salary'];
        } else {
            // echo "No result found.";
        }
        //////////////////////////////////////////////////////////////
        if ($service == 1) {
            $date = new DateTime($lastAlawaDate);
            $date->modify("+" . 12 . " months");
            $date->modify("-" . $thanks . " days"); //shoker
            $date->modify("+" . $oqobat . " days"); //giabat oqobat
            $resultAlawatDate = $date->format("Y-m-d");

        } else {
            $resultAlawatDate = "لايستحق علاوة  لكونه متقاعد او مجاز 5 سنوات";
        }
        if ($service == 1) {
            if ($asgria == 4) {
                $date = new DateTime($lastTarfee);
                $date->modify("+" . 48 . " months");
                $date->modify("-" . $thanksT . " days"); //shoker
                $date->modify("+" . $oqobatT . " days"); //giabat oqobat
                $resultTarDate = $date->format("Y-m-d");

            }
            if ($asgria == 5) {
                $date = new DateTime($lastTarfee);
                $date->modify("+" . 60 . " months");
                $date->modify("-" . $thanksT . " days"); //shoker
                $date->modify("+" . $oqobatT . " days"); //giabat oqobat
                $resultTarDate = $date->format("Y-m-d");

            }




        } else {
            $resultTarDate = "لايستحق ترفيع  لكونه متقاعد او مجاز 5 سنوات";
        }

        $date = new DateTime($towld);
        $date->modify("+" . 756 . " months");
        $resultTakadDate = $date->format("Y-m-d");
        //////////////////////////////////////////////////////////////////////////
        // $degree="0";

        if ($degree == 10) {
            $sDegree = 3000;
        } elseif ($degree == 9) {
            $sDegree = 3000;

        } elseif ($degree == 8) {
            $sDegree = 3000;

        } elseif ($degree == 7) {

            $sDegree = 6000;
        } elseif ($degree == 6) {
            $sDegree = 6000;

        } elseif ($degree == 5) {
            $sDegree = 6000;

        } elseif ($degree == 4) {
            $sDegree = 8000;

        } elseif ($degree == 3) {
            $sDegree = 10000;

        } elseif ($degree == 2) {
            $sDegree = 17000;

        } else {
            $sDegree = 20000;

        }
        /////////////////////////////////////////////////////////////



        // Close the database connection
        // mysqli_close($conn);
    }
    if (isset($_POST['add'])) {
        $archNumber = $_POST['archNumber'];
        $recordNumber = $_POST['recordNumber'];
        $empName = $_POST['empName'];
        $gander = $_POST['gander'];
        $service = $_POST['service'];
        $jdchos = $_POST['jd'];
        $ctchos = $_POST['ct'];
        $empJopPos = $_POST['empJopPos'];
        $degree = $_POST['degree'];
        $stage = $_POST['stage'];
        $currentSalary = $_POST['currentSalary'];
        $lastAlawaDate = $_POST['lastAlawaDate'];
        $thanksDetails = $_POST['thanksDetails'];
        $oqobatDetails = $_POST['oqobatDetails'];
        $thanks = $_POST['thanks'];
        $oqobat = $_POST['oqobat'];
        $newAlawa = $_POST['newAlawa'];
        $lastTarfee = $_POST['lastTarfee'];
        $asgria = $_POST['asgria'];
        $thanksT = $_POST['thanksT'];
        $oqobatT = $_POST['oqobatT'];
        $newTarfee = $_POST['newTarfee'];
        $newSalary = $_POST['newSalary'];
        $startDate = $_POST['startDate'];
        $towld = $_POST['towld'];
        $taqadDate = $_POST['taqadDate'];
        $notes = $_POST['notes'];

        $query = "SELECT COUNT(*) FROM emp WHERE empName = '$empName' OR archNumber='$archNumber' OR recordNumber='$recordNumber' ";
        $result = $conn->query($query);
        if ($result) {
            $count = $result->fetch_row()[0];

            // Check if the value exists
            if ($count > 0) {
                $existempmsg = "هذا الموظف موجود لايمكن اضافته مرة اخرى";
            } else {
                if (!empty($currentSalary) && !empty($newAlawa) && !empty($newTarfee) && !empty($newSalary) && !empty($taqadDate)) {
                    $sql = "INSERT INTO emp (archNumber,recordNumber,empName,gander,service,jd,ct,empJopPos,degree,stage,currentSalary,lastAlawaDate,thanksDetails,oqobatDetails,
                thanks,oqobat,newAlawa,lastTarfee,asgria,thanksT,oqobatT,newTarfee,newSalary,startDate,towld,taqadDate,notes) VALUES ('$archNumber','$recordNumber','$empName','$gander','$service'
                ,'$jdchos','$ctchos','$empJopPos','$degree','$stage','$currentSalary','$lastAlawaDate','$thanksDetails','$oqobatDetails','$thanks','$oqobat','$newAlawa','$lastTarfee','$asgria','$thanksT'
                ,'$oqobatT','$newTarfee','$newSalary','$startDate','$towld','$taqadDate','$notes')";

                    if ($conn->query($sql) === TRUE) {
                        $sucessmsg = "تمت إضافة البيانات بنجاح.";
                    } else {
                        echo "خطأ: " . $sql . "<br>" . $conn->error;
                    }

                } else {
                    $emptyErrorMsg = "قم بحساب العلاوات والترفيعات اولا ";

                }


            }
        } else {
            echo "Query failed: " . $conn->error;
        }





    }
    if (isset($_POST['update'])) {
        $archNumber = $_POST['archNumber'];
        $recordNumber = $_POST['recordNumber'];
        $empName = $_POST['empName'];
        $gander = $_POST['gander'];
        $service = $_POST['service'];
        $jdchos = $_POST['jd'];
        $ctchos = $_POST['ct'];
        $empJopPos = $_POST['empJopPos'];
        $degree = $_POST['degree'];
        $stage = $_POST['stage'];
        $currentSalary = $_POST['currentSalary'];
        $lastAlawaDate = $_POST['lastAlawaDate'];
        $thanksDetails = $_POST['thanksDetails'];
        $oqobatDetails = $_POST['oqobatDetails'];
        $thanks = $_POST['thanks'];
        $oqobat = $_POST['oqobat'];
        $newAlawa = $_POST['newAlawa'];
        $lastTarfee = $_POST['lastTarfee'];
        $asgria = $_POST['asgria'];
        $thanksT = $_POST['thanksT'];
        $oqobatT = $_POST['oqobatT'];
        $newTarfee = $_POST['newTarfee'];
        $newSalary = $_POST['newSalary'];
        $startDate = $_POST['startDate'];
        $towld = $_POST['towld'];
        $taqadDate = $_POST['taqadDate'];
        $notes = $_POST['notes'];
        $checkQuery = "SELECT * FROM `emp` WHERE `recordNumber` = '$recordNumber'";
        $checkResult = $conn->query($checkQuery);
        if (!empty($currentSalary) && !empty($newAlawa) && !empty($newTarfee) && !empty($newSalary) && !empty($taqadDate)) {
            if ($checkResult->num_rows > 0) {
                $sql = "UPDATE `emp` SET `archNumber`='$archNumber',`empName`='$empName',
                `gander`='$gander',`service`='$service',`jd`='$jdchos',`ct`='$ctchos',`empJopPos`='$empJopPos',`degree`='$degree',
                `stage`='$stage',`currentSalary`='$currentSalary',`lastAlawaDate`='$lastAlawaDate',`thanksDetails`='$thanksDetails',
                `oqobatDetails`='$oqobatDetails',`thanks`='$thanks',`oqobat`='$oqobat',`newAlawa`='$newAlawa',`lastTarfee`='$lastTarfee',
                `asgria`='$asgria',`thanksT`='$thanksT',`oqobatT`='$oqobatT',`newTarfee`='$newTarfee',`newSalary`='$newSalary',
                `startDate`='$startDate',`towld`='$towld',`taqadDate`='$taqadDate',`notes`='$notes' 
                 WHERE recordNumber='$recordNumber'";

                if ($conn->query($sql) === TRUE) {
                    $sucessmsgup = "تمت تحديث البيانات بنجاح.";
                } else {
                    echo "خطأ: " . $sql . "<br>" . $conn->error;
                }


            }else{
                $updatErorrMsg="لايمكن تحديث بيانات موظف غير موجود تاكد من الرقم الوظيفي";
            }


        } else {
            $emptyErrorMsg = "قم بحساب العلاوات والترفيعات اولا ";

        }





    }
}
$query = "SELECT salary FROM salary WHERE degree = '$degree' AND stage = '$stage'";
        $result = mysqli_query($conn, $query);
        // Display the result in the output field
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $thesalary = $row['salary'];
        } else {
            // echo "No result found.";
        }
        if ($degree == 10) {
            $sDegree = 3000;
        } elseif ($degree == 9) {
            $sDegree = 3000;

        } elseif ($degree == 8) {
            $sDegree = 3000;

        } elseif ($degree == 7) {

            $sDegree = 6000;
        } elseif ($degree == 6) {
            $sDegree = 6000;

        } elseif ($degree == 5) {
            $sDegree = 6000;

        } elseif ($degree == 4) {
            $sDegree = 8000;

        } elseif ($degree == 3) {
            $sDegree = 10000;

        } elseif ($degree == 2) {
            $sDegree = 17000;

        } else {
            $sDegree = 20000;

        }
?>