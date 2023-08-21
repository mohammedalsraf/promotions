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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
<?php include("topmenu.php")?>
<?php include("popupdefine.php")?>
<?php include("getjd.php")?>
<?php include("getct.php")?>
<?php $archNumber="";$degree=""; $stage=""; $gander="";
$recordNumber=""; $empName="";$service="";
$jdchos="";$ctchos="";$empJopPos="";
$thanks=""; $oqobat="";$thanksT=""; $oqobatT="";
$thanksDetails=""; $oqobatDetails="";
$lastTarfee="";$asgria="";$startDate="";$towld="";
$resultTakadDate="";$notes="";

 include("getsalary.php");

 
 ?>


<?php 
$min = 1; // Minimum number
$max = 10000; // Maximum number
$existingNumbers = [5, 10, 15, 20]; // Existing numbers

do {
    $randomNumber = rand($min, $max);
} while (in_array($randomNumber, $existingNumbers));
?>
<div class="container mt-4 ">
                <div class="border p-3 bg-success text-light">
                    <h2 class="text-center">
                      ادخل معلومات الموظف ثم قم بحساب العلاوات والترفيعات وحفظها
                    </h2>

                </div>
            </div>
            <?php if(!empty($existempmsg)){ echo '<div class="container mt-4 ">
                <div class="alert alert-danger" role="alert">
                  هذا الموظف موجود لايمكن اضافته مرة اخرى
                </div>
            </div>';};
            if(!empty($sucessmsg)){
              echo '<div class="container mt-4 ">
                <div class="alert alert-success" role="alert">
                تمت عملية الاضافة  بنجاح
                 
                </div>
            </div>';
              
              

            }
            if(!empty($emptyErrorMsg)){
              echo '<div class="container mt-4 ">
                <div class="alert alert-warning" role="alert">
                قم بحساب العلاوات والترفيعات اولا    
                 
                </div>
            </div>';
             
            }
            if(!empty($updatErorrMsg)){
              echo '<div class="container mt-4 ">
                <div class="alert alert-info" role="alert">
                لايمكن تحديث بيانات موظف غير موجود تاكد من الرقم الوظيفي"   
                 
                </div>
            </div>';
             
            }
            if(!empty($sucessmsgup)){
              echo '<div class="container mt-4 ">
                <div class="alert alert-info" role="alert">
                تم تحديث البيانات بنجاح.                 
                </div>
            </div>';
             
            }
            
            
            
            
            
            
            
            ?>
  <div class="container mt-5">
    <form method="post" >
      <div class="row">
        <div class="col-md-2">
          <div class="mb-3">
            <label for="input1" class="form-label">رقم الاضبارة</label>
            <input type="number" class="form-control " id="input1" name="archNumber" value="<?php  echo $archNumber?>" required>
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label"> الرقم الوظيفي</label>
            <input type="number" class="form-control" id="input2" name="recordNumber" value="<?php  echo $recordNumber?>" required>
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">الاسم الرباعي واللقب</label>
            <input type="text" class="form-control" id="input2" name="empName" value="<?php  echo $empName?>" required>
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">الجنس</label>
            <select class="form-control" data-live-search="true" name="gander" required>
              <option value="ذكر" <?php if ($gander === 'ذكر') echo 'selected'; ?>>ذكر</option>
              <option value="انثى"<?php if ($gander === 'انثى') echo 'selected'; ?> >انثى</option>
             </select>
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">حالة الخدمة</label>
            <select class="form-control" data-live-search="true" name="service" required>
              <option value="1" <?php if ($service === '1') echo 'selected'; ?>>مستمر</option>
              <option value="2"<?php if ($service === '2') echo 'selected'; ?> >متقاعد</option>
              <option value="3"<?php if ($service === '3') echo 'selected'; ?> >اجازة 5 سنوات</option>
              <option value="4"<?php if ($service === '4') echo 'selected'; ?> >متوفي</option>
             </select>
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">العنوان الوظيفي</label>
            <select id="dep" name="jd" class="form-select" aria-label=".form-select-sm example" required>
              <?php foreach ($jd as $jd): ?>
                <option value="<?php echo $jd['jd'];?>" <?php if($jdchos==$jd['jd']) echo 'selected';?>><?php echo $jd['jd']; ?></option>
              <?php endforeach; ?>
              </select>
          </div>
          
          <!-- Repeat similar code for input 3 to 8 -->
        </div>
        <div class="col-md-2">
          <div class="mb-3">
            <label for="input1" class="form-label">التحصيل الدراسي</label>
            <select id="dep" name="ct" class="form-select" aria-label=".form-select-sm example" required>
              <?php foreach ($ct as $ct): ?>
                <option value="<?php echo $ct['ct'];?>" <?php if($ctchos==$ct['ct']) echo 'selected';?>><?php echo $ct['ct']; ?></option>
              <?php endforeach; ?>
              </select>
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">موقع العمل</label>
            <input type="text" class="form-control" id="input2" name="empJopPos" value="<?php echo $empJopPos ?>" required>
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">الدرجة الوظيفية</label>
            <select class="form-control" data-live-search="true" name="degree" required >
              <option value="1" <?php if ($degree === '1') echo 'selected'; ?>>1</option>
              <option value="2" <?php if ($degree === '2') echo 'selected'; ?>>2</option>
              <option value="3" <?php if ($degree === '3') echo 'selected'; ?>>3</option>
              <option value="4" <?php if ($degree === '4') echo 'selected'; ?>>4</option>
              <option value="5" <?php if ($degree === '5') echo 'selected'; ?>>5</option>
              <option value="6" <?php if ($degree === '6') echo 'selected'; ?>>6</option>
              <option value="7" <?php if ($degree === '7') echo 'selected'; ?>>7</option>
              <option value="8" <?php if ($degree === '8') echo 'selected'; ?>>8</option>
              <option value="9" <?php if ($degree === '9') echo 'selected'; ?>>9</option>
              <option value="10" <?php if ($degree === '10') echo 'selected'; ?>>10</option>
            </select>
            
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">المرحلة</label>
            <select class="form-control" data-live-search="true" name="stage" required >
              <option value="1" <?php if ($stage === '1') echo 'selected'; ?>>1</option>
              <option value="2" <?php if ($stage === '2') echo 'selected'; ?>>2</option>
              <option value="3" <?php if ($stage === '3') echo 'selected'; ?>>3</option>
              <option value="4" <?php if ($stage === '4') echo 'selected'; ?>>4</option>
              <option value="5" <?php if ($stage === '5') echo 'selected'; ?>>5</option>
              <option value="6" <?php if ($stage === '6') echo 'selected'; ?>>6</option>
              <option value="7" <?php if ($stage === '7') echo 'selected'; ?>>7</option>
              <option value="8" <?php if ($stage === '8') echo 'selected'; ?>>8</option>
              <option value="9" <?php if ($stage === '9') echo 'selected'; ?>>9</option>
              <option value="10" <?php if ($stage === '10') echo 'selected'; ?>>10</option>
             </select>
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">الراتب الشهري الحالي</label>
            <input readonly type="text" class="form-control  bg-danger text-light" id="input2" name="currentSalary" value="<?php if(!empty($thesalary)){echo  $thesalary;}else{ echo "قم بتحديد الدرجة والمرحلة اولا";}?>">
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">تاريخ اخر علاوة</label>
            <input type="date" class="form-control" id="input2" name="lastAlawaDate" value="<?php echo $lastAlawaDate?>" required>
          </div>
          
          <!-- Repeat similar code for input 3 to 8 -->
        </div>
        <div class="col-md-3">
        <div class="mb-3">
            <label for="input2" class="form-label"> ارقام كتب الشكر وانواعها والتواريخ</label>
            <textarea name="thanksDetails" id="" cols="30" rows="1" class="form-control" required><?php echo $thanksDetails ?></textarea>
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label"> ارقام العقوبات وانواعها والتواريخ</label>
            <textarea   name="oqobatDetails" id="" cols="30" rows="1" class="form-control" required ><?php echo $oqobatDetails ?> </textarea>
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">عدد القدم للعلاوة  (يوم)</label>
            <input type="number" class="form-control" id="input2" name="thanks"  value="<?php echo "$thanks"?>" required>
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">عدد العقوبات او الغيابات للعلاوة   (يوم) </label>
            <input type="number" class="form-control" id="input2" name="oqobat" value="<?php echo "$oqobat"?>" required>
          </div>
          <div class="mb-3">
          <div class="mb-3">
            <label for="input2" class="form-label">التاريخ الجديد للعلاوة</label>
            <input readonly type="text" class="form-control bg-success text-light" id="input2" name="newAlawa" value="<?php if(!empty($resultAlawatDate)){echo  $resultAlawatDate;}else{}?>">
          </div>
          
            <label for="input2" class="form-label">تاريخ اخر ترفيع</label>
            <input type="date" class="form-control" id="input2" name="lastTarfee" value="<?php echo $lastTarfee?>" required>
          </div>
          
       
         
         
        
          
          <!-- Repeat similar code for input 3 to 8 -->
        </div>
        
        <div class="col-md-3">
        <div class="mb-3">
            <label for="input2" class="form-label">المدة الاصغرية (سنوات)</label>
            <select class="form-control" data-live-search="true" name="asgria" >
              <option value="4" <?php if ($asgria === '4') echo 'selected'; ?>>4</option>
              <option value="5" <?php if ($asgria === '5') echo 'selected'; ?>>5</option>
            
             </select>
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">عدد القدم للترفيع  (يوم)</label>
            <input type="number" class="form-control" id="input2" name="thanksT"  value="<?php echo "$thanksT"?>" required>
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">عدد العقوبات او الغيابات للترفيع   (يوم) </label>
            <input type="number" class="form-control" id="input2" name="oqobatT" value="<?php echo "$oqobatT"?>" required>
          </div>
       
          <div class="mb-3">
            <label for="input2" class="form-label">التاريخ الجديد للترفيع</label>
            <input readonly type="text" class="form-control bg-success text-light" id="input2" name="newTarfee" value="<?php if(!empty($resultTarDate)){echo  $resultTarDate;}else{}?>">
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">الراتب الجديد بعد العلاوة</label>
            <input readonly type="text" class="form-control bg-danger text-light" id="input2" name="newSalary" value="<?php if(!empty($thesalary)){echo  $thesalary+$sDegree;}else{}?>">
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label">تاريخ التعين </label>
            <input type="date" class="form-control" id="input2" name="startDate" value="<?php echo $startDate?>" required>
          </div>
          
         
          
          <!-- Repeat similar code for input 3 to 8 -->
        </div>
        <div class="col-md-2">
        <div class="mb-3">
            <label for="input2" class="form-label">تاريخ التولد </label>
            <input type="date" class="form-control" id="input2" name="towld" value="<?php echo $towld?>" required>
          </div>
        <div class="mb-3">
            <label for="input2" class="form-label">تاريخ التقاعد </label>
            <input readonly type="text" class="form-control bg-success text-light" id="input2" name="taqadDate" value="<?php echo $resultTakadDate ?> ">
          </div>
          <div class="mb-3">
            <label for="input2" class="form-label"> الملاحضات</label>
            <input type="text" class="form-control" id="input2" name="notes" value="<?php echo $notes ?> " >
          </div>
       
         
          
          <!-- Repeat similar code for input 3 to 8 -->
        </div>
        
        
     
      </div>
    

      <button type="submit" class="btn btn-primary" name="submit">حساب العلاوات والترفيعات</button>
      <button type="submit" class="btn btn-primary" name="add">اضافة</button>
     
      
      
    </form>
  
            
  </div>
<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
