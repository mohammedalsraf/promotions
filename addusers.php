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
   
    $username = $_POST["username"];
    $password = $_POST["password"];
  
    
    $sql = "INSERT INTO users (username,password) VALUES ('$username','$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "تمت إضافة البيانات بنجاح.";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }
}else{
   
    if(isset($_GET["id"])){
        $id=$_GET['id'];
        $sql = "DELETE FROM `users` WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "تمت إضافة البيانات بنجاح.";
        } else {
            echo "خطأ: " . $sql . "<br>" . $conn->error;
        }
    }

    
    
}

// Fetch data from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>تعريف المستخدمين  </title>
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
            <label for="name" class="form-label">المستخدم:</label>
            <input type="number" class="form-control" id="degree" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label"> كلمة المرور :</label>
            <input type="number" class="form-control" id="number" name="password" required>
        </div>
        
        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
   </div>
    
    <h2 class="mt-5">جدول البيانات</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <!-- <th scope="col">الرقم</th> -->
                <th scope="col">المستخدم</th>
                <th scope="col"> كلمة المرور</th>
                
             
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["username"] . "</td><td>" . $row["password"] ."</td><td>" ."<a class='btn btn-danger btn-sm' name='delete' href='addusers.php?id=$row[id]'>حذف</a>"."</td></tr>";
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
