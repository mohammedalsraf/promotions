<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: index.php"); // Redirect to the login page
    exit();
}

?>
<?php
include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $degree = $_POST["degree"];
    $stage = $_POST["stage"];
    $salary = $_POST["salary"];
    
    $sql = "INSERT INTO salary (degree,stage,salary) VALUES ('$degree','$stage','$salary')";
    
    if ($conn->query($sql) === TRUE) {
        echo "تمت إضافة البيانات بنجاح.";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }
}else{
   
    if(isset($_GET["id"])){
        $id=$_GET['id'];
        $sql = "DELETE FROM `salary` WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "تمت إضافة البيانات بنجاح.";
        } else {
            echo "خطأ: " . $sql . "<br>" . $conn->error;
        }
    }

    
    
}

// Fetch data from the database
$sql = "SELECT * FROM salary";
$result = $conn->query($sql);

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>تعريف الدرجات والعلاوات السنوية</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

</head>
<body>
<?php include("topmenu.php")?>
<?php include("popupdefine.php")?>

<div class="container mt-5">
   <div class="col-3">
   <h2>إضافة البيانات</h2>
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">الدرجة:</label>
            <input type="number" class="form-control" id="degree" name="degree" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label"> المرحلة :</label>
            <input type="number" class="form-control" id="number" name="stage" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label"> الراتب :</label>
            <input type="number" class="form-control" id="number" name="salary" required>
        </div>
        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
   </div>
    
    <h2 class="mt-5">جدول البيانات</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <!-- <th scope="col">الرقم</th> -->
                <th scope="col">الدرجة</th>
                <th scope="col"> المرحلة</th>
                <th scope="col"> الراتب</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["degree"] . "</td><td>" . $row["stage"] ."</td><td>" . $row["salary"] . "</td><td>"."<a class='btn btn-danger btn-sm' name='delete' href='definesalary.php?id=$row[id]'>حذف</a>"."</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>لا توجد بيانات متاحة</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Include Bootstrap JS -->
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="code.jquery.com_jquery-3.7.0.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
<script src="bootstrap-4.5.3/js/bootstrap.min.js"></script>

</body>
</html>
