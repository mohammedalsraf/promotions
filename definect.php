<?php
include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $ct= $_POST["ct"];
 
    
    $sql = "INSERT INTO ct (ct) VALUES ('$ct')";
    
    if ($conn->query($sql) === TRUE) {
        echo "تمت إضافة البيانات بنجاح.";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }
}else{
   
    if(isset($_GET["id"])){
        $id=$_GET['id'];
        $sql = "DELETE FROM `ct` WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "تمت إضافة البيانات بنجاح.";
        } else {
            echo "خطأ: " . $sql . "<br>" . $conn->error;
        }
    }

    
    
}

// Fetch data from the database
$sql = "SELECT * FROM ct";
$result = $conn->query($sql);

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>تعريف العناوين الوظيفية</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<body>
<?php include("topmenu.php")?>
<?php include("popupdefine.php")?>

<div class="container mt-5">
   <div class="col-3">
   <h2>إضافة البيانات</h2>
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">التحصيل الدراسي:</label>
            <input type="text" class="form-control" id="ct" name="ct" required>
        </div>
       
        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
   </div>
    
    <h2 class="mt-5">جدول البيانات</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <!-- <th scope="col">الرقم</th> -->
                <th scope="col">العنوان الوظيفي</th>
           
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["ct"] . "</td>"  . "<td>"."<a class='btn btn-danger btn-sm' name='delete' href='definect.php?id=$row[id]'>حذف</a>"."</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>لا توجد بيانات متاحة</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
