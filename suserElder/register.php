<?php session_start ();
require_once '../connection.php';
if(isset($_POST['submit'])){
    $nationalId = $_POST['nationalId'];
    $FnationalId = $_POST['FnationalId'];
    $nationality = $_POST['nationality'];
    $country = $_POST['country'];
    $uname = $_POST['uname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $bmi = $weight / (($height/100)*($height/100));
    $diabetesCheck = $_POST['diabetesCheck'];
    $pressure = $_POST['systolic'].'/'.$_POST['diastolic'];
    $date = date("Y/m/d");
    $location = $_POST['location'];
    $diabetes = $_POST['diabetes'];
    $bloodpressure = $_POST['bloodpressure'];
    $heartdisease = $_POST['heartdisease'];
    $smoking = $_POST['smoking'];
    $HbA1c = 0;
    $triglycerides = 0;
    $hdl = 0;
    $egrf = $_POST['egrf'];
    $ldl = 0;
    $creatinine = $_POST['creatinine'];
    $cholesterol = 0;
    $gov = $_POST['gov'];
    $qism = $_POST['qism'];
     $hb = $_POST['hb'];
    $feces = $_POST['feces'];
    $sight = $_POST['sight'];
    $teeth= $_POST['teeth'];
    $heart = $_POST['heart'];
    $cog = $_POST['cog'];
    $gds = $_POST['gds'];
    $must = $_POST['must'];
    $xray = $_POST['xray'];
    $liver = $_POST['liver'];
    $kidneys = $_POST['kidneys'];
    $womb = $_POST['womb'];
    $prostate = $_POST['prostate'];
    $aorta = $_POST['aorta'];
    
$ins="INSERT INTO elder (nationalId,FnationalId,nationality,nationalityc,name,gender,age,mobile,height,weight,BMI,date,location,bloodpressure,diabetes,heartdisease,diabetesCheck,pressure,hba,triglycerides,hdl,egfr,ldl,creatinine,cholesterol,smoking,governorate,qism,hb,feces,sight,teeth,heart,cog,gds,must,xray,liver,kidneys,womb,prostate,aorta)VALUES ('$nationalId','$FnationalId ','$nationality','$country','$uname','$gender','$age','$phone','$height','$weight','$bmi','$date','$location','$bloodpressure','$diabetes','$heartdisease','$diabetesCheck','$pressure','$HbA1c','$triglycerides','$hdl','$egrf','$ldl','$creatinine','$cholesterol','$smoking','$gov','$qism','$hb','$feces','$sight','$teeth','$heart','$cog','$gds','$must','$xray','$liver','$kidneys','$womb','$prostate','$aorta')";
$query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
if($query) 
{ 
       echo '<script type="text/javascript">';
     echo 'alert("تم التسجيل بنجاح");';
    echo '</script>';
  echo '<script type="text/javascript">';echo'window.location.href="../check.php";';echo '</script>';
    
}
    else{
           echo '<script type="text/javascript">';
     echo ' alert("عفواً! لم يتم التسجيل");';
    echo '</script>';
         echo '<script type="text/javascript">';echo'window.location.href="form.php";';echo '</script>';
    }
}


?>