<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: index.php"); // Redirect to the login page
    exit();
}

?>


<!DOCTYPE html>
<html dir="rtl">

<head>
  <link rel="stylesheet" href="style.css">
  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <style>
    .box {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 150px;
      margin-bottom: 20px;
    }

    .maindiv {
      margin-top: 200px
    }

   
  </style>
  <title>home</title>
</head>
</head>

<body>
  <?php include("topmenu.php") ?>
  <?php include("popupdefine.php") ?>

  <body>

    <div class="container mt-4 " ;>
      <div class="row maindiv">
        <div class="col-md-6">
          <a href="addemp.php" class="box"
            style="background-color: red; color: white ; text-decoration: none;">
            <h2>فتح ملف موظف</h2>
          </a>
        </div>
        <div class="col-md-6">
          <a href="searchupdate.php" class="box"
            style="background-color: blue; color: white;text-decoration: none;">
            <h2>بحث وتحديث</h2>
          </a>
        </div>
        <div class="col-md-6">
          <a href="report.php" class="box"
            style="background-color: green; color: white;text-decoration: none;">
            <h2>تقرير العلاوات والترفيعات</h2>
          </a>
        </div>
        <div class="col-md-6">
          <a href="alert.php" class="box"
            style="background-color: orange; color: white;text-decoration: none;">
            <h2> التنبيهات </h2>
          </a>
        </div>
      </div>
    </div>

  </body>





  <!-- Add other modal structures for Info, Services, and Contact forms -->

  <!-- Add Bootstrap JS scripts at the end of the body -->
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="code.jquery.com_jquery-3.7.0.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
<script src="bootstrap-4.5.3/js/bootstrap.min.js"></script>

</body>

</html>