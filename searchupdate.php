<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
  header("Location: index.php"); // Redirect to the login page
  exit();
}

?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
</head>

<body>
  <?php include("topmenu.php") ?>
  <?php include("popupdefine.php") ?>
  <?php $searchKeyword = "";
  include("conn.php");
  // Step 2: Get search keyword from user input (assuming it's in $_POST["search"])
  if (isset($_POST["search"])) {
    $searchKeyword = mysqli_real_escape_string($conn, $_POST["search"]);

    // Step 3: Construct the SQL query
    $query = "SELECT * FROM emp 
              WHERE empName LIKE '%$searchKeyword%' 
                 OR archNumber LIKE '%$searchKeyword%'
                 OR recordNumber LIKE '%$searchKeyword%'
                 ;";

    // Step 4: Execute the query
    $result = mysqli_query($conn, $query);

    if (!$result) {
      die("Query failed: " . mysqli_error($conn));
    }
  }




  ?>


  <div class="container mt-4 ">
    <div class="border p-3 bg-success text-light">
      <h2 class="text-center">
        ابحث عن اسم الموظف او الرقم الوظيفي او رقم الاضبارة
      </h2>

    </div>
  </div>
  <div class="container mt-5">
    <div class="container mt-5  col-3 ">

      <form class="form-inline" method="post">
        <div class="form-group my-3">
          <label for="searchInput" class="sr-only">بحث</label>
          <input type="text" class="form-control mr-2" id="searchInput" placeholder="ابحث..." name="search">
        </div>
        <button type="submit" class="btn btn-primary mr-2">ابحث</button>
        <!-- <button type="button" class="btn btn-danger" id="cancelButton">الغاء</button> -->
        <button type="submit" class="btn btn-success mr-2" name="viewall">عرض الكل</button>
      </form>
    </div>
  </div>

  <div class="container my-5 maintable">
    <div class="my-1">
      <a class='btn btn-primary ' href='home.php'>الرجوع للصفحة الرئيسية</a>
    </div>
    <table class="table table-primary  table-hover table-bordered ">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">اسم الموظف</th>
          <th scope="col">رقم الاظبارة</th>
          <th scope="col">الرقم الوظيفي</th>
          <th scope="col">الراتب الحالي</th>
          <th scope="col">تاريخ العلاوة الجديدة</th>
          <th scope="col">تاريخ الترفيع الجديد</th>
          <th scope="col">الراتب بعد العلاوة</th>
          <th scope="col">تاريخ التقاعد</th>
          <th scope="col">الملاحضات</th>

          <th scope="col">الاجراء</th>

        </tr>
      </thead>
      <?php
      if (isset($_POST['viewall'])) {
        $searchKeyword = " ";
      }
      if ($searchKeyword !== "") {
        if (!empty($result)) {
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              // Process and display the data here
              // For example, you can echo out the results
              echo "
              <tbody>
              <tr>
              <td>  <a href='details.php?id=$row[id]' class='search-link'>
              
            </a> </td>
                <td>$row[empName]</td>
                <td>$row[archNumber]</td>
                <td>$row[recordNumber]</td>
                <td>$row[currentSalary]</td>
                <td>$row[newAlawa]</td>
                <td>$row[newTarfee]</td>
                <td>$row[newSalary]</td>
                <td>$row[taqadDate]</td>
                <td>$row[notes]</td>
              
                <td>  
                <a  class='btn btn-primary btn-sm' href='update.php?id=$row[id]'>تحديث </a>
                <a  class='btn btn-danger btn-sm remove'  href='delet.php?id=$row[id]' onclick='confirmationDelete();return false;'>حذف</a>
      
                </td>  
              </tr>
              
              </tbody>";
            }
          } else {
            echo "No results found.";
          }
        }


      }


      // Step 6: Close the database connection
      mysqli_close($conn);
      // <td><img src='uploads/$row[filename] '   width='300' height='300', class='profile-photo' alt='photo'/>
      ?>
    </table>


  </div>
  <script>
    function confirmationDelete(anchor) {
      var conf = confirm('هل انت متاكد انك تريد حذف هذا العنصر ؟');
      if (conf)
        window.location = anchor.attr("href");
    }

  </script>
  <!-- <script
  src="https://code.jquery.com/jquery-3.7.0.js"
  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous"></script> -->

  <script>
    $(document).ready(function () {
      // Add click event listener to the cancel button
      $('#cancelButton').click(function () {
        // Clear the search input text
        $('#searchInput').val('');
      });
    });
  </script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="code.jquery.com_jquery-3.7.0.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
  <script src="bootstrap-4.5.3/js/bootstrap.min.js"></script>
</body>

</html>