<?php session_start();if(empty($_SESSION['Login']) || $_SESSION['Login'] == ''){
    header("Location: ../index.php");
    die();
}else{include '../connection.php'; ?><html dir="rtl">
   <head>
      <title>وزارة الصحة و السكان - برنامج رعاية كبار السن</title>
       <meta charset="UTF-8">
        <link rel="shortcut icon" href="../img/Ministry_of_Health_and_Population_of_Egypt.png" type="image/x-icon">
      <link rel="stylesheet" href="../css/all.min.css">
      <link rel="stylesheet" href="../css/animate.css">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/font-awesome.min.css">
       <link rel="stylesheet" href="../css/stylesheet.css">
            <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
       <script src="../js/jquery-3.3.1.min.js"></script> 
       <style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo&display=swap');
        body{
            font-family: 'Cairo', sans-serif; !important
        }
    
    </style>

    </head>
      <body>
     <nav> 
        <div class="row">
        <div class="col-1"><img src="../img/Ministry_of_Health_and_Population_of_Egypt.png" class="img-fluid" style="height:75px;  margin-top: 0px;"/></div>
            <div class="col-4">
            <h6 class="text-white" style=" font-weight: bold;">
                  <br>جمهورية مصر العربية
                 <br>وزارة الصحة و السكان
                </h6>
            </div>
      <div class="dropdown show d-inline">
  <a class="h3 dropdown-toggle float-left ml-4 mt-4 text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php echo $_SESSION['name']; ?> 
  </a>
  <div class="dropdown-menu float-left" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item border-bottom text-center" href="edit.php">تغير كلمة المرور</a>
    <a class="dropdown-item text-center" href="../index.php">تسجيل خروج</a>
  </div>
</div> 
            <div class="col-1"></div>
            <div class="col-4 pt-1"><img src="../img/100million.png" class="img-fluid" style="height:80px;"></div>
</div>
		</nav>
    
        <div class="title text-center text-dark border-bottom mb-3" >
        <h4 class="heading">برنامج رعاية كبار السن </h4>
            <p style="font-size: 16px; color:red;">أدخل جميع البيانات المطلوبة في الحقول *</p>
            </div>
         <section class="container" id="result">
                  
                   <div class="col-3 mr-4 font-weight-bold"><p class="text-right" style="font-size:14px;"><?php echo "التاريخ  : " . date("Y/m/d"); ?></p></div>
            
          <h4 class="container-fluid headOfPersonal mb-2 pb-2" > البيانات الاساسية 
            </h4>
        
   <form name="Info" method="post" action="register.php">
         <?php
     if($_SESSION['nationality'] == 'مصرى'){
             $nationalID = $_SESSION['nationalId'];
             $query= "SELECT * FROM patients WHERE nationalId = '$nationalID' AND nationalId != '0' limit 1";
    $do= mysqli_query($conn,$query);
    $count= mysqli_num_rows($do);
       $query1= "SELECT * FROM elder WHERE nationalId = '$nationalID' AND nationalId != '0' limit 1";
    $do1= mysqli_query($conn,$query1);
    $count1= mysqli_num_rows($do1);
    if($count >0){
        while($result= mysqli_fetch_array($do)){
             ?>
        <input type="text" style="display:none;" value="<?php echo $_SESSION['name']; ?>" name="location" id="location">
             <input type="text" style="display:none;"  value="<?php echo $_SESSION['qism']; ?>" name="qism" id="qism">   
       <input type="text" style="display:none;"  value="<?php echo $_SESSION['governorate']; ?>" name="gov" id="gov">
<section class="container">
    <div id="form-container" class="container" >
        <h3 id="hntt" style="color:red;"></h3>
        <div class="row">
                <div class="mb-3  col-3">
    <label for="nationality" class="form-label">الجنسية :</label>
    <input type="text" class="form-control w-75" name="nationality" id="nationality" value="<?php echo $result['nationality']; ?>" readonly>
  </div>
<div class="mb-3  col-3">
    <label for="nationalId" class="form-label">الرقم القومى :</label>
    <input type="text" class="form-control w-75" name="nationalId" id="nationalId" value="<?php echo $_SESSION['nationalId']; ?>" readonly>
  </div> 
         <div class="mb-3 col-6">
    <label for="uname" class="form-label">الاسم رباعى (كما هو مدون بالبطاقة أو وثيقة السفر) :</label>
    <input type="text" class="form-control w-75" name="uname" id="uname" maxlength="50" autocomplete="off"  onkeypress="return CheckArabicCharactersOnly(event);"onfocus="validationID()" required value="<?php echo $result['name']; ?>" readonly>
  </div>
        </div>
        <div class="row">
              <div class="mb-3  col-3">
    <label for="gender" class="form-label">النوع :</label>
    <input type="text" class="form-control w-75" name="gender" id="gender" value="<?php echo $result['gender']; ?>" readonly>
  </div>
              <div id="eage" class="mb-3  col-3">
    <label for="age" class="form-label">السن :</label>
    <input type="number" class="form-control w-75" name="age" id="age" value="<?php echo $_SESSION['age']; ?>" readonly>
  </div>
            
            <div class="mb-3 col-3">
    <label for="phone" class="form-label">تليفون :</label>
    <input type="text" class="form-control w-75" name="phone" id="phone" onkeypress="return isNumberKey(event)" onchange="phoneValidation()" minlength="11"  maxlength="11" autocomplete="off" required value="<?php echo $result['mobile']; ?>">
                <p id="phoneError" style="color:red;"></p>
                </div>
         </div>    
    </div>
    <hr>
           
  <h4 class="container-fluid headOfPersonal pb-2" >متابعة زيارات المريض
         <p class="mt-2 h4 font-weight-bold" id="showHide" onclick="toggleForm()">
          <i class="fas fa-chevron-down"></i> 
            </h4>
       <div class="container" id="tableDiv" style="overflow-x:scroll; display:none;">
       
       <table id="tblData" class="table table-striped table-bordered">
	        	<thead>
                    <tr>  
                   
                    <th>تاريخ الزيارة</th>
                    <th>مكان الزيارة</th>
                    <th> مؤشر كتلة الجسم</th>
                    <th>السكر العشوائى</th>
                    <th>ضغط الدم</th> 
                    <th>HbA1c</th>   
                    <th>Triglycerides</th>   
                    <th>HDL</th>  
                    <th>eGFR</th>  
                    <th>LDL</th>
                    <th>Creatinine</th>
                    <th>Total Cholesterol</th>
                    <th>HB</th>  
                    <th>اختبار كاشف الدم الخفى بالبراز</th>  
                    <th>قياس حدة النظر</th>
                    <th>تقييم الأسنان</th>  
                    <th>رسم القلب</th>  
                    <th>اختبار mini-cog للتقييم النفسي</th>
                    <th>مؤشر GDS للتقييم النفسي</th>  
                    <th>اداة MUST للتقيم التغذوى </th>  
                    <th>الموجات فوق صوتيه على البطن </th>
                    <th>الكبد</th>  
                    <th>الكلى</th>
                    <th>الرحم</th>
                    <th>البروستاتا</th> 
                    <th>تضخم بالشريان الاورطى</th>    
                        
                        
                        
                    </tr>    
           </thead>
                    <tbody>
                       <?php 
           
            $pro1 = "SELECT * FROM elder where nationalId = '$nationalID' ORDER BY date DESC";
$query1 = mysqli_query( $conn,$pro1) or die('error:'.mysqli_error($conn));
$result1 = mysqli_fetch_array($query1);
            if($result1 > 0){
do{
                        ?>
                        <tr>
           
                        <td> <?php echo $result1['date'];?></td>
                        <td> <?php echo $result1['location'];?></td>
                         <td> <?php echo $result1['BMI'];?></td>
                         <td> <?php echo $result1['diabetesCheck'];?></td>
                         <td> <?php echo $result1['pressure'];?></td>
                           <td> <?php echo $result1['hba'];?></td>
                         <td> <?php echo $result1['triglycerides'];?></td>
                         <td> <?php echo $result1['hdl'];?></td> 
                           <td> <?php echo $result1['egfr'];?></td>
                         <td> <?php echo $result1['ldl'];?></td>
                         <td> <?php echo $result1['creatinine'];?></td>  
                         <td> <?php echo $result1['cholesterol'];?></td>  
                           <td> <?php echo $result1['hb'];?></td>
                         <td> <?php echo $result1['feces'];?></td>
                         <td> <?php echo $result1['sight'];?></td> 
                             <td> <?php echo $result1['teeth'];?></td>
                         <td> <?php echo $result1['heart'];?></td>
                         <td> <?php echo $result1['cog'];?></td> 
                             <td> <?php echo $result1['gds'];?></td>
                         <td> <?php echo $result1['must'];?></td>
                         <td> <?php echo $result1['xray'];?></td> 
                             <td> <?php echo $result1['liver'];?></td>
                         <td> <?php echo $result1['kidneys'];?></td>
                         <td> <?php echo $result1['womb'];?></td> 
                             <td> <?php echo $result1['prostate'];?></td>
                         <td> <?php echo $result1['aorta'];?></td>                   
               
       </tr>   
                        <?php } while($result1=mysqli_fetch_array($query1));
                }
           $pro = "SELECT * FROM patients where nationalId = '$nationalID' ORDER BY date DESC";
$query = mysqli_query( $conn,$pro) or die('error:'.mysqli_error($conn));
$result = mysqli_fetch_array($query);
            if($result > 0){
                
            
do{
                        ?>
                        <tr>
                         <td> <?php echo $result['date'];?></td>
                        <td> <?php echo $result['location'];?></td>
                         <td> <?php echo $result['BMI'];?></td>
                         <td> <?php echo $result['diabetesCheck'];?></td>
                         <td> <?php echo $result['pressure'];?></td>
                           <td> <?php echo $result['hba'];?></td>
                         <td> <?php echo $result['triglycerides'];?></td>
                         <td> <?php echo $result['hdl'];?></td> 
                           <td> <?php echo $result['egfr'];?></td>
                         <td> <?php echo $result['ldl'];?></td>
                         <td> <?php echo $result['creatinine'];?></td>  
                         <td> <?php echo $result['cholesterol'];?></td>  
                              <td> </td>
                         <td> </td>
                         <td></td> 
                             <td> </td>
                         <td> </td>
                         <td> </td> 
                             <td> </td>
                         <td> </td>
                         <td> </td> 
                             <td> </td>
                         <td> </td>
                         <td> </td> 
                             <td> </td>
                         <td> </td>
                                                    
               
       </tr>   
                        <?php } while($result=mysqli_fetch_array($query));
                }
            
            
?>
                        
           </tbody>
      
           </table>
        
       </div> 
    <hr>
     <h4 class="container-fluid headOfPersonal mb-2 pb-2" > التاريخ الطبـى (هل يوجد)   
            </h4>
        <div class="form-container-rep text-right pr-3" style="background-color:#eeeeee;">
            <div class="row pt-2 mb-4">
             <div  class="mb-3 col-3">
    <label for="diabetes" class="form-label"> إصابة بمرض السكر :</label>
    <select name="diabetes" id="diabetes" class="form-select w-75 form-control" onfocus="noneDiabetes();" onchange="Check()">
      <option value=" "  >--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select> 
  </div>        
                
                
               <div  class="mb-3 col-3">
    <label for="bloodpressure" class="form-label">إصابة بمرض ضغط الدم :</label>
    <select name="bloodpressure" id="bloodpressure" class="form-select w-75 form-control" onchange="Check()">
      <option value=" "  >--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>     
  </div>        
             <div  class="mb-3 col-3">
    <label for="heartdisease" class="form-label">إصابة بأمراض القلب :</label>
    <select name="heartdisease" id="heartdisease" class="form-select w-75 form-control" >
      <option value=" ">--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>  
  </div>        
<div  class="mb-3 col-3">
    <label for="smoking" class="form-label">التدخين :</label>
    <select name="smoking" id="smoking" class="form-select w-75 form-control" onchange="checkAll();">
      <option value=" ">--اختر--</option>
       <option value="مدخن" >مدخن</option>
         <option value="غير مدخن">غير مدخن</option>
         <option value="مدخن سابق">مدخن سابق</option>
    </select> 
  </div>        
            </div>
            </div>
   
    
     <hr>

  <h4 class="container-fluid headOfPersonal mb-2 pb-2" >الفحوصات الطبية 
            </h4>
        <div class="form-container-rep text-right pr-3" style="background-color:#eeeeee;">
               <div class="row pb-3 pt-3">
                    <div class="mb-3 col-3" >
    <label for="pressureeCheck" class="form-label">الضغط :</label><br>
    <input type="number" class="form-control  d-inline" name="systolic" id="systolic" placeholder="systolic" autocomplete="off" onchange="errorCheck();" min="60" max="260" style="width:45%;"  required> <span class="font-weight-bold">/</span>
    <input type="number"  class="form-control  d-inline" name="diastolic" id="diastolic" placeholder="diastolic" autocomplete="off" onchange="errorCheck();" min="30" max="150" style="width:47%;" required>
                        <p id="pressureError" style=" color:red;"></p>
  </div> 
               <div class="mb-3 pt-  col-3 ">
    <label for="height" class="form-label"> الطول(سم):</label>
    <input type="number" class="form-control w-75 " name="height" id="height" min="50"  max="300" onkeypress="return isNumberKey(event)" maxlength="3" autocomplete="off" onchange="errorCheck();" required>
    <p id="heightError" style=" color:red;"></p>
  </div> 
         <div class="mb-3 col-3 ">
    <label for="weight" class="form-label"> الوزن(كجم) :</label>
    <input type="number" class="form-control w-75" name="weight" id="weight" min="40"  max="250" onkeypress="return isNumberKey(event)" maxlength="3" onchange="bmiCalculate(); errorCheck(); " autocomplete="off" required>
             <p id="weightError"  style="color:red;"></p>
						 </div> 
   
                   
                     <div id="bmiDiv" class="mb-3 col-3" style="display:none;">
    <label for="bmi" class="form-label"> مؤشر كتلة الجسم:</label>
<p id="bmi" name="bmi" style="width:200px; height:40px; background-color:white;  border-radius: 5px; border:2px solid #FBE6C2; padding-top:8px; padding-bottom:8px; padding-right:2px; color:black;" maxlength="5"></p>
     
  </div>    
                    </div>
           
            <div class="row">
                 <div class="mb-3 col-3 ">
                    <label for="diabetesCheck" class="form-label"> فحص السكر(العشوائى) :</label>
                    <input type="number" class="form-control w-75" name="diabetesCheck" id="diabetesCheck" min="7"  max="600" onkeypress="return isNumberKey(event)" maxlength="4" autocomplete="off" onchange="errorCheck();" required>
                    <p id="diabetesError" style="color:red;"></p>
                </div>
             

                <div id="egfrDiv" class="mb-3 col-3 " style="display:block;">
                    <label for="egrf" class="form-label">eGFR :</label>
                    <input type="number" class="form-control w-75" name="egrf" id="egrf"  onkeypress="return isNumberKey(event)" maxlength="2" autocomplete="off" onchange="errorCheck();">

                </div>
                <div id="creatinineDiv" class="mb-3 col-3 " style="display:block;">
                    <label for="creatinine" class="form-label">Creatinine :</label>
                    <input type="text" class="form-control w-75" name="creatinine" id="creatinine" min="0.1" max="15"  maxlength="4" autocomplete="off"  onchange="errorCheck();">
                    <p id="creatinineError" style="color:red;"></p>
                </div>
            </div>


            <div class="row">
                <div class="mb-3 col-3 ">
                    <label for="hb" class="form-label"> HB
                        :</label>
                    <input type="number" class="form-control w-75" name="hb" id="p1" min="0"  max="18" onkeypress="return isNumberKey(event)" maxlength="2" autocomplete="off"  onchange="errorCheck();">
                    <p id="hbError" style="color:red;"></p>
                </div>
                <div class="mb-3 col-3" style="display:block;">
                 <label for="feces" class="form-label">اختبار كاشف الدم الخفي بالبراز :</label>
                 <select name="feces" id="p2" class="form-select w-75 form-control"  >
                     <option value=" ">--اختر--</option>
                     <option value="ايجابي" >ايجابي</option>
                     <option value="سلبي">سلبي </option>
                     <option value="لم يتم">لم يتم </option>
                    
                 </select>
             </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="sight" class="form-label">قياس حدة النظر :</label>
                    <select name="sight" id="p3" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعي" >طبيعي</option>
                        <option value="يحتاج لتدخل">
                            يحتاج لتدخل
                        </option>
                        
                                             <option value="لم يتم">لم يتم </option>

                    </select>
                </div>
                <div class="mb-3 col-3" id="hba cDiv"  style="display:block;">
                    <label for="teeth" class="form-label">تقييم الاسنان  :</label>
                    <select name="teeth" id="p4" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعى" >طبيعي</option>
                        <option value="لا">بحاجه لتدخل في وحدات الرعاية الصحية الاولية</option>
                        <option value="بحاجه لتدخل بالمستشفي">بحاجه لتدخل بالمستشفي
                        </option>

                    </select>
                </div>
			 </div>
            <div class="row">
                <div class="mb-3 col-3 ">
                    <label for="heart" class="form-label">رسم القلب :</label>
                    <select name="heart" id="p5" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
                        <option value="لم يتم">لم يتم </option>               
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="cog" class="form-label">اختبار Mini-Cog للتقييم النفسي :</label>
                    <select name="cog" id="p6" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعى" >طبيعي</option>
                         <option value="متابعة" >يحتاج لمتابعة</option>
                         <option value="تحويل" >تحويل لمستشفى</option>

                       
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="gds" class="form-label">مؤشر GDS للتقييم النفسي :</label>
                    <select name="gds" id="p7" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="0" >0-4</option>
                         <option value="5" >5-10</option>
                         <option value="11" >اكبر من 11</option>
                   
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="must" class="form-label">للتقييم التغذوي MUST اداه  :</label>
                    <select name="must" id="p8" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="0" >0</option>
                        <option value="1">1</option>
                        <option value="2">2 فاكثر</option>
             
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-3" id="xrayDiv"  style="display:block;">
                    <label for="xray" class="form-label">الموجات فوق صوتيه علي البطن :</label>
                    <select name="xray" id="p9" class="form-select w-75 form-control" onchange="message(); checkGender1();">
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
            </div>
            <div class="row" id="xrays" style="visibility: hidden;">
                <div class="mb-3 col-2" id="liverDiv">
                    <label for="liver" class="form-label">الكبد :</label>
                    <select name="liver" id="liver" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="تليف">تليف بالكبد</option>
                        <option value="دهنى"> دهنى</option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="kidneysDiv">
                    <label for="kidneys" class="form-label">الكلى :</label>
                    <select name="kidneys" id="kidneys" class="form-select form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="wombDiv">
                    <label for="womb" class="form-label">الرحم :</label>
                    <select name="womb" id="womb" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="prostateDiv">
                    <label for="prostate" class="form-label">البروستاتا :</label>
                    <select name="prostate" id="prostate" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-3" id="aortaDiv">
                    <label for="aorta" class="form-label">تضخم بالشريان الاورطي :</label>
                    <select name="aorta" id="aorta" class="form-select w-75 form-control"  onchange="message(); xrays();">
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >نعم</option>
                        <option value="لا">لا</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
            </div>
            <p id="pa1" style="color:red; font-size: 18px;"></p>
	        <p id="pa2" style="color:red; font-size: 18px;"></p>
            <p id="pa3" style="color:red; font-size: 18px;"></p>
            <p id="pa4" style="color:red; font-size: 18px;"></p>
            <p id="pa5" style="color:red; font-size: 18px;"></p>
	        <p id="pa6" style="color:red; font-size: 18px;"></p>
            <p id="pa7" style="color:red; font-size: 18px;"></p>
            <p id="pa8" style="color:red; font-size: 18px;"></p>
            <p id="pa9" style="color:red; font-size: 18px;"></p>
            <p id="pa10" style="color:red; font-size: 18px;"></p>
             <p id="pa11" style="color:red; font-size: 18px;"></p>
             <p id="pa12" style="color:red; font-size: 18px;"></p>
             <p id="pa13" style="color:red; font-size: 18px;"></p>
            <p id="message" style="color:red; font-size:18px;"></p>
	        <p id="message1" style="color:red; font-size:18px;"></p>
            <p id="message2" style="color:red; font-size:18px;"></p>
            <p id="message3" style="color:red; font-size:18px;"></p>
            
            
    </div>
	   </section>

       <?php
        }}
      else if($count1 > 0){
          while($result1= mysqli_fetch_array($do1)){
             ?>
        <input type="text" style="display:none;" value="<?php echo $_SESSION['name']; ?>" name="location" id="location">
             <input type="text" style="display:none;"  value="<?php echo $_SESSION['qism']; ?>" name="qism" id="qism">   
       <input type="text" style="display:none;"  value="<?php echo $_SESSION['governorate']; ?>" name="gov" id="gov">
<section class="container">
    <div id="form-container" class="container" >
        <h3 id="hntt" style="color:red;"></h3>
        <div class="row">
                <div class="mb-3  col-3">
    <label for="nationality" class="form-label">الجنسية :</label>
    <input type="text" class="form-control w-75" name="nationality" id="nationality" value="<?php echo $result1['nationality']; ?>" readonly>
  </div>
<div class="mb-3  col-3">
    <label for="nationalId" class="form-label">الرقم القومى :</label>
    <input type="text" class="form-control w-75" name="nationalId" id="nationalId" value="<?php echo $_SESSION['nationalId']; ?>" readonly>
  </div> 
         <div class="mb-3 col-6">
    <label for="uname" class="form-label">الاسم رباعى (كما هو مدون بالبطاقة أو وثيقة السفر) :</label>
    <input type="text" class="form-control w-75" name="uname" id="uname" maxlength="50" autocomplete="off"  onkeypress="return CheckArabicCharactersOnly(event);"onfocus="validationID()" required value="<?php echo $result1['name']; ?>" readonly>
  </div>
        </div>
        <div class="row">
              <div class="mb-3  col-3">
    <label for="gender" class="form-label">النوع :</label>
    <input type="text" class="form-control w-75" name="gender" id="gender" value="<?php echo $result1['gender']; ?>" readonly>
  </div>
              <div id="eage" class="mb-3  col-3">
    <label for="age" class="form-label">السن :</label>
    <input type="number" class="form-control w-75" name="age" id="age" value="<?php echo $_SESSION['age']; ?>" readonly>
  </div>
            
            <div class="mb-3 col-3">
    <label for="phone" class="form-label">تليفون :</label>
    <input type="text" class="form-control w-75" name="phone" id="phone" onkeypress="return isNumberKey(event)" onchange="phoneValidation()" minlength="11" maxlength="11" autocomplete="off" required value="<?php echo $result1['mobile']; ?>">
                <p id="phoneError" style="color:red;"></p>
                </div>
         </div>    
    </div>
    
            <hr>
  <h4 class="container-fluid headOfPersonal pb-2" >متابعة زيارات المريض
         <p class="mt-2 h4 font-weight-bold" id="showHide" onclick="toggleForm()">
          <i class="fas fa-chevron-down"></i> 
            </h4>
       <div class="container" id="tableDiv" style="overflow-x:scroll; display:none;">
       
       <table id="tblData" class="table table-striped table-bordered">
	        	<thead>
                    <tr>  
                   
                    <th>تاريخ الزيارة</th>
                    <th>مكان الزيارة</th>
                    <th> مؤشر كتلة الجسم</th>
                    <th>السكر العشوائى</th>
                    <th>ضغط الدم</th> 
                    <th>HbA1c</th>   
                    <th>Triglycerides</th>   
                    <th>HDL</th>  
                    <th>eGFR</th>  
                    <th>LDL</th>
                    <th>Creatinine</th>
                    <th>Total Cholesterol</th>
                    <th>HB</th>  
                    <th>اختبار كاشف الدم الخفى بالبراز</th>  
                    <th>قياس حدة النظر</th>
                    <th>تقييم الأسنان</th>  
                    <th>رسم القلب</th>  
                    <th>اختبار mini-cog للتقييم النفسي</th>
                    <th>مؤشر GDS للتقييم النفسي</th>  
                    <th>اداة MUST للتقيم التغذوى </th>  
                    <th>الموجات فوق صوتيه على البطن </th>
                    <th>الكبد</th>  
                    <th>الكلى</th>
                    <th>الرحم</th>
                    <th>البروستاتا</th> 
                    <th>تضخم بالشريان الاورطى</th>    
                        
                        
                        
                    </tr>    
           </thead>
                    <tbody>
                       <?php 
           
            $pro1 = "SELECT * FROM elder where nationalId = '$nationalID' ORDER BY date DESC";
$query1 = mysqli_query( $conn,$pro1) or die('error:'.mysqli_error($conn));
$result1 = mysqli_fetch_array($query1);
            if($result1 > 0){
do{
                        ?>
                        <tr>
           
                                  <td> <?php echo $result1['date'];?></td>
                        <td> <?php echo $result1['location'];?></td>
                         <td> <?php echo $result1['BMI'];?></td>
                         <td> <?php echo $result1['diabetesCheck'];?></td>
                         <td> <?php echo $result1['pressure'];?></td>
                           <td> <?php echo $result1['hba'];?></td>
                         <td> <?php echo $result1['triglycerides'];?></td>
                         <td> <?php echo $result1['hdl'];?></td> 
                           <td> <?php echo $result1['egfr'];?></td>
                         <td> <?php echo $result1['ldl'];?></td>
                         <td> <?php echo $result1['creatinine'];?></td>  
                         <td> <?php echo $result1['cholesterol'];?></td>  
                           <td> <?php echo $result1['hb'];?></td>
                         <td> <?php echo $result1['feces'];?></td>
                         <td> <?php echo $result1['sight'];?></td> 
                             <td> <?php echo $result1['teeth'];?></td>
                         <td> <?php echo $result1['heart'];?></td>
                         <td> <?php echo $result1['cog'];?></td> 
                             <td> <?php echo $result1['gds'];?></td>
                         <td> <?php echo $result1['must'];?></td>
                         <td> <?php echo $result1['xray'];?></td> 
                             <td> <?php echo $result1['liver'];?></td>
                         <td> <?php echo $result1['kidneys'];?></td>
                         <td> <?php echo $result1['womb'];?></td> 
                             <td> <?php echo $result1['prostate'];?></td>
                         <td> <?php echo $result1['aorta'];?></td>                   
               
       </tr>   
                        <?php } while($result1=mysqli_fetch_array($query1));
                }
           $pro = "SELECT * FROM patients where nationalId = '$nationalID' ORDER BY date DESC";
$query = mysqli_query( $conn,$pro) or die('error:'.mysqli_error($conn));
$result = mysqli_fetch_array($query);
            if($result > 0){
                
            
do{
                        ?>
                        <tr>
                         <td> <?php echo $result['date'];?></td>
                        <td> <?php echo $result['location'];?></td>
                         <td> <?php echo $result['BMI'];?></td>
                         <td> <?php echo $result['diabetesCheck'];?></td>
                         <td> <?php echo $result['pressure'];?></td>
                           <td> <?php echo $result['hba'];?></td>
                         <td> <?php echo $result['triglycerides'];?></td>
                         <td> <?php echo $result['hdl'];?></td> 
                           <td> <?php echo $result['egfr'];?></td>
                         <td> <?php echo $result['ldl'];?></td>
                         <td> <?php echo $result['creatinine'];?></td>  
                         <td> <?php echo $result['cholesterol'];?></td>  
                              <td> </td>
                         <td> </td>
                         <td></td> 
                             <td> </td>
                         <td> </td>
                         <td> </td> 
                             <td> </td>
                         <td> </td>
                         <td> </td> 
                             <td> </td>
                         <td> </td>
                         <td> </td> 
                             <td> </td>
                         <td> </td>
                                                    
               
       </tr>   
                        <?php } while($result=mysqli_fetch_array($query));
                }
            
            
?>
                        
           </tbody>
      
           </table>
        
       </div> 
    <hr>
     <h4 class="container-fluid headOfPersonal mb-2 pb-2" > التاريخ الطبـى (هل يوجد)   
            </h4>
        <div class="form-container-rep text-right pr-3" style="background-color:#eeeeee;">
            <div class="row pt-2 mb-4">
             <div  class="mb-3 col-3">
    <label for="diabetes" class="form-label"> إصابة بمرض السكر :</label>
    <select name="diabetes" id="diabetes" class="form-select w-75 form-control" onchange="Check()">
      <option value=" "  >--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select> 
  </div>        
                
                
               <div  class="mb-3 col-3">
    <label for="bloodpressure" class="form-label">إصابة بمرض ضغط الدم :</label>
    <select name="bloodpressure" id="bloodpressure" class="form-select w-75 form-control" onchange=" Check()" >
      <option value=" ">--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>     
  </div>        
             <div  class="mb-3 col-3">
    <label for="heartdisease" class="form-label">إصابة بأمراض القلب :</label>
    <select name="heartdisease" id="heartdisease" class="form-select w-75 form-control" >
      <option value=" ">--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>  
  </div>        
<div  class="mb-3 col-3">
    <label for="smoking" class="form-label">التدخين :</label>
    <select name="smoking" id="smoking" class="form-select w-75 form-control" onchange="checkAll();">
      <option value="  ">--اختر--</option>
       <option value="مدخن" >مدخن</option>
         <option value="غير مدخن">غير مدخن</option>
         <option value="مدخن سابق">مدخن سابق</option>
    </select> 
  </div>        
            </div>
            </div>
   
    
     <hr>

  <h4 class="container-fluid headOfPersonal mb-2 pb-2" >الفحوصات الطبية 
            </h4>
        <div class="form-container-rep text-right pr-3" style="background-color:#eeeeee;">
               <div class="row pb-3 pt-3">
                    <div class="mb-3 col-3" >
    <label for="pressureeCheck" class="form-label">الضغط :</label><br>
    <input type="number" class="form-control  d-inline" name="systolic" id="systolic" placeholder="systolic" autocomplete="off" onchange="errorCheck();" min="60" max="260" style="width:45%;"  required> <span class="font-weight-bold">/</span>
    <input type="number"  class="form-control  d-inline" name="diastolic" id="diastolic" placeholder="diastolic" autocomplete="off" onchange="errorCheck();" min="30" max="150" style="width:47%;" required>
                        <p id="pressureError" style=" color:red;"></p>
  </div> 
               <div class="mb-3 pt-  col-3 ">
    <label for="height" class="form-label"> الطول(سم):</label>
    <input type="number" class="form-control w-75 " name="height" id="height" min="50"  max="300" onkeypress="return isNumberKey(event)" maxlength="3" autocomplete="off" onchange="errorCheck(); " required>
    <p id="heightError" style=" color:red;"></p>
  </div> 
         <div class="mb-3 col-3 ">
    <label for="weight" class="form-label"> الوزن(كجم) :</label>
    <input type="number" class="form-control w-75" name="weight" id="weight" min="40"  max="250" onkeypress="return isNumberKey(event)" maxlength="3" onchange="bmiCalculate(); errorCheck(); " autocomplete="off" required>
             <p id="weightError"  style="color:red;"></p>
						 </div> 
   
                   
                     <div id="bmiDiv" class="mb-3 col-3" style="display:none;">
    <label for="bmi" class="form-label"> مؤشر كتلة الجسم:</label>
<p id="bmi" name="bmi" style="width:200px; height:40px; background-color:white;  border-radius: 5px; border:2px solid #FBE6C2; padding-top:8px; padding-bottom:8px; padding-right:2px; color:black;" maxlength="5"></p>
     
  </div>    
                    </div>
           
            <div class="row">
                 <div class="mb-3 col-3 ">
                    <label for="diabetesCheck" class="form-label"> فحص السكر(العشوائى) :</label>
                    <input type="number" class="form-control w-75" name="diabetesCheck" id="diabetesCheck" min="7"  max="600" onkeypress="return isNumberKey(event)" maxlength="4" autocomplete="off" onchange="errorCheck();" required>
                    <p id="diabetesError" style="color:red;"></p>
                </div>
            

                <div id="egfrDiv" class="mb-3 col-3 " style="display:block;">
                    <label for="egrf" class="form-label">eGFR :</label>
                    <input type="number" class="form-control w-75" name="egrf" id="egrf"  onkeypress="return isNumberKey(event)" maxlength="2" autocomplete="off" onchange="errorCheck();">

                </div>
                <div id="creatinineDiv" class="mb-3 col-3 " style="display:block;">
                    <label for="creatinine" class="form-label">Creatinine :</label>
                    <input type="text" class="form-control w-75" name="creatinine" id="creatinine" min="0.1" max="15"  maxlength="4" autocomplete="off"  onchange="errorCheck();">
                    <p id="creatinineError" style="color:red;"></p>
                </div>
            </div>

         

            <div class="row">
                <div class="mb-3 col-3 ">
                    <label for="hb" class="form-label"> HB
                        :</label>
                    <input type="number" class="form-control w-75" name="hb" id="p1" min="0"  max="18" onkeypress="return isNumberKey(event)" maxlength="2" autocomplete="off"  onchange="errorCheck();">
                    <p id="hbError" style="color:red;"></p>
                </div>
                <div class="mb-3 col-3" style="display:block;">
                 <label for="feces" class="form-label">اختبار كاشف الدم الخفي بالبراز :</label>
                 <select name="feces" id="p2" class="form-select w-75 form-control"  >
                     <option value=" ">--اختر--</option>
                     <option value="ايجابي" >ايجابي</option>
                     <option value="سلبي">سلبي </option>
                     <option value="لم يتم">لم يتم </option>
                 </select>
             </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="sight" class="form-label">قياس حدة النظر :</label>
                    <select name="sight" id="p3" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعي" >طبيعي</option>
                        <option value="يحتاج لتدخل">
                            يحتاج لتدخل
                        </option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-3" id="hba cDiv"  style="display:block;">
                    <label for="teeth" class="form-label">تقييم الاسنان  :</label>
                    <select name="teeth" id="p4" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعى" >طبيعي</option>
                        <option value="لا">بحاجه لتدخل في وحدات الرعاية الصحية الاولية</option>
                        <option value="بحاجه لتدخل بالمستشفي">بحاجه لتدخل بالمستشفي
                        </option>
                       
                    </select>
                </div>
			 </div>
            <div class="row">
                <div class="mb-3 col-3 ">
                    <label for="heart" class="form-label">رسم القلب :</label>
                    <select name="heart" id="p5" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="cog" class="form-label">اختبار Mini-Cog للتقييم النفسي :</label>
                    <select name="cog" id="p6" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعى" >طبيعي</option>
                         <option value="متابعة" >يحتاج لمتابعة</option>
                         <option value="تحويل" >تحويل لمستشفى</option>
                    
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="gds" class="form-label">مؤشر GDS للتقييم النفسي :</label>
                    <select name="gds" id="p7" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="0" >0-4</option>
                         <option value="5" >5-10</option>
                         <option value="11" >اكبر من 11</option>
                  
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="must" class="form-label">للتقييم التغذوي MUST اداه  :</label>
                    <select name="must" id="p8" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="0" >0</option>
                        <option value="1">1</option>
                       <option value="2">2 فاكثر</option>
                       
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-3" id="xrayDiv"  style="display:block;">
                    <label for="xray" class="form-label">الموجات فوق صوتيه علي البطن :</label>
                    <select name="xray" id="p9" class="form-select w-75 form-control" onchange="message(); checkGender1(); checkAll();">
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>

            </div>
            <div class="row" id="xrays" style="visibility: hidden;">
                <div class="mb-3 col-2" id="liverDiv">
                    <label for="liver" class="form-label">الكبد :</label>
                    <select name="liver" id="liver" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="تليف">تليف بالكبد</option>
                        <option value="دهنى"> دهنى</option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="kidneysDiv">
                    <label for="kidneys" class="form-label">الكلى :</label>
                    <select name="kidneys" id="kidneys" class="form-select form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="wombDiv">
                    <label for="womb" class="form-label">الرحم :</label>
                    <select name="womb" id="womb" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="prostateDiv">
                    <label for="prostate" class="form-label">البروستاتا :</label>
                    <select name="prostate" id="prostate" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-3" id="aortaDiv">
                    <label for="aorta" class="form-label">تضخم بالشريان الاورطي :</label>
                    <select name="aorta" id="aorta" class="form-select w-75 form-control"  onchange="message(); xrays();">
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >نعم</option>
                        <option value="لا">لا</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>



            </div>



            <p id="pa1" style="color:red; font-size: 18px;"></p>
	        <p id="pa2" style="color:red; font-size: 18px;"></p>
            <p id="pa3" style="color:red; font-size: 18px;"></p>
            <p id="pa4" style="color:red; font-size: 18px;"></p>
            <p id="pa5" style="color:red; font-size: 18px;"></p>
	        <p id="pa6" style="color:red; font-size: 18px;"></p>
            <p id="pa7" style="color:red; font-size: 18px;"></p>
            <p id="pa8" style="color:red; font-size: 18px;"></p>
            <p id="pa9" style="color:red; font-size: 18px;"></p>
            <p id="pa10" style="color:red; font-size: 18px;"></p>
             <p id="pa11" style="color:red; font-size: 18px;"></p>
             <p id="pa12" style="color:red; font-size: 18px;"></p>
             <p id="pa13" style="color:red; font-size: 18px;"></p>
            <p id="message" style="color:red; font-size:18px;"></p>
	        <p id="message1" style="color:red; font-size:18px;"></p>
            <p id="message2" style="color:red; font-size:18px;"></p>
            <p id="message3" style="color:red; font-size:18px;"></p>
            
            
    </div>
	   </section>
       
     <?php
          }}
      else if ($count1 != 1 || $count != 1){
          ?>
          <input type="text" style="display:none;" value="<?php echo $_SESSION['name']; ?>" name="location" id="location">
             <input type="text" style="display:none;"  value="<?php echo $_SESSION['qism']; ?>" name="qism" id="qism">   
       <input type="text" style="display:none;"  value="<?php echo $_SESSION['governorate']; ?>" name="gov" id="gov">
<section class="container">
    <div id="form-container" class="container" >
        <h3 id="hntt" style="color:red;"></h3>
        <div class="row">
                <div class="mb-3  col-3">
    <label for="nationality" class="form-label">الجنسية :</label>
    <input type="text" class="form-control w-75" name="nationality" id="nationality" value="<?php echo $_SESSION['nationality']; ?>" readonly>
  </div>
<div class="mb-3  col-3">
    <label for="nationalId" class="form-label">الرقم القومى :</label>
    <input type="text" class="form-control w-75" name="nationalId" id="nationalId" value="<?php echo $_SESSION['nationalId']; ?>" readonly>
    <p id="idError" style="color:red;"></p>
  </div> 
         <div class="mb-3 col-6">
    <label for="uname" class="form-label">الاسم رباعى (كما هو مدون بالبطاقة أو وثيقة السفر) :</label>
    <input type="text" class="form-control w-75" name="uname" id="uname" maxlength="50" autocomplete="off"  onkeypress="return CheckArabicCharactersOnly(event);" onfocus="validationID()" required >
  </div>
        </div>
        <div class="row">
       <div class="form-check col-3">
                <label class="form-check-label pt-2 pl-2">النوع : </label>
               <input  type="radio" name="gender" id="male" value="ذكر" >
                <label class="ml-3"  for="male"> ذكر </label><br>
           <label class="form-check-label pl-2" style="visibility:hidden;">النوع : </label>
              <input  type="radio" name="gender" id="female" value="أنثى">
             <label for="female">أنثى</label>
            </div>
            
              <div id="eage" class="mb-3  col-3">
    <label for="age" class="form-label">السن :</label>
    <input type="number" class="form-control w-75" name="age" id="age" value="<?php echo $_SESSION['age']; ?>" readonly>
  </div>
            
            <div class="mb-3 col-3">
    <label for="phone" class="form-label">تليفون :</label>
<input type="text" class="form-control w-75" name="phone" id="phone" onkeypress="return isNumberKey(event)" onchange="phoneValidation()" minlength="11" maxlength="11" autocomplete="off" required>
                <p id="phoneError" style="color:red;"></p>
                </div>
         </div>    
    </div>
    
            <hr>
     <h4 class="container-fluid headOfPersonal mb-2 pb-2" > التاريخ الطبـى (هل يوجد)   
            </h4>
        <div class="form-container-rep text-right pr-3" style="background-color:#eeeeee;">
            <div class="row pt-2 mb-4">
             <div  class="mb-3 col-3">
    <label for="diabetes" class="form-label"> إصابة بمرض السكر :</label>
    <select name="diabetes" id="diabetes" class="form-select w-75 form-control" onchange="Check()">
      <option value=" "  >--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select> 
  </div>        
                
                
               <div  class="mb-3 col-3">
    <label for="bloodpressure" class="form-label">إصابة بمرض ضغط الدم :</label>
    <select name="bloodpressure" id="bloodpressure" class="form-select w-75 form-control" onchange=" Check()" >
      <option value=" ">--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>     
  </div>        
             <div  class="mb-3 col-3">
    <label for="heartdisease" class="form-label">إصابة بأمراض القلب :</label>
    <select name="heartdisease" id="heartdisease" class="form-select w-75 form-control" >
      <option value=" ">--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>  
  </div>        
<div  class="mb-3 col-3">
    <label for="smoking" class="form-label">التدخين :</label>
    <select name="smoking" id="smoking" class="form-select w-75 form-control" onchange="checkAll();">
      <option value="  ">--اختر--</option>
       <option value="مدخن" >مدخن</option>
         <option value="غير مدخن">غير مدخن</option>
         <option value="مدخن سابق">مدخن سابق</option>
    </select> 
  </div>        
            </div>
            </div>
   
    
     <hr>

  <h4 class="container-fluid headOfPersonal mb-2 pb-2" >الفحوصات الطبية 
            </h4>
        <div class="form-container-rep text-right pr-3" style="background-color:#eeeeee;">
               <div class="row pb-3 pt-3">
                    <div class="mb-3 col-3" >
    <label for="pressureeCheck" class="form-label">الضغط :</label><br>
    <input type="number" class="form-control  d-inline" name="systolic" id="systolic" placeholder="systolic" autocomplete="off" onchange="errorCheck();" min="60" max="260" style="width:45%;"  required> <span class="font-weight-bold">/</span>
    <input type="number"  class="form-control  d-inline" name="diastolic" id="diastolic" placeholder="diastolic" autocomplete="off" onchange="errorCheck();" min="30" max="150" style="width:47%;" required>
                        <p id="pressureError" style=" color:red;"></p>
  </div> 
               <div class="mb-3 pt-  col-3 ">
    <label for="height" class="form-label"> الطول(سم):</label>
    <input type="number" class="form-control w-75 " name="height" id="height" min="50"  max="300" onkeypress="return isNumberKey(event)" maxlength="3" autocomplete="off" onchange="errorCheck(); " required>
    <p id="heightError" style=" color:red;"></p>
  </div> 
         <div class="mb-3 col-3 ">
    <label for="weight" class="form-label"> الوزن(كجم) :</label>
    <input type="number" class="form-control w-75" name="weight" id="weight" min="40"  max="250" onkeypress="return isNumberKey(event)" maxlength="3" onchange="bmiCalculate(); errorCheck(); " autocomplete="off" required>
             <p id="weightError"  style="color:red;"></p>
						 </div> 
   
                   
                     <div id="bmiDiv" class="mb-3 col-3" style="display:none;">
    <label for="bmi" class="form-label"> مؤشر كتلة الجسم:</label>
<p id="bmi" name="bmi" style="width:200px; height:40px; background-color:white;  border-radius: 5px; border:2px solid #FBE6C2; padding-top:8px; padding-bottom:8px; padding-right:2px; color:black;" maxlength="5"></p>
     
  </div>    
                    </div>
           
            <div class="row">
                 <div class="mb-3 col-3 ">
                    <label for="diabetesCheck" class="form-label"> فحص السكر(العشوائى) :</label>
                    <input type="number" class="form-control w-75" name="diabetesCheck" id="diabetesCheck" min="7"  max="600" onkeypress="return isNumberKey(event)" maxlength="4" autocomplete="off" onchange="errorCheck();" required>
                    <p id="diabetesError" style="color:red;"></p>
                </div>
              

                <div id="egfrDiv" class="mb-3 col-3 " style="display:block;">
                    <label for="egrf" class="form-label">eGFR :</label>
                    <input type="number" class="form-control w-75" name="egrf" id="egrf"  onkeypress="return isNumberKey(event)" maxlength="2" autocomplete="off" onchange="errorCheck();">

                </div>
                <div id="creatinineDiv" class="mb-3 col-3 " style="display:block;">
                    <label for="creatinine" class="form-label">Creatinine :</label>
                    <input type="text" class="form-control w-75" name="creatinine" id="creatinine" min="0.1" max="15"  maxlength="4" autocomplete="off"  onchange="errorCheck();">
                    <p id="creatinineError" style="color:red;"></p>
                </div>
            </div>


            <div class="row">
                <div class="mb-3 col-3 ">
                    <label for="hb" class="form-label"> HB
                        :</label>
                    <input type="number" class="form-control w-75" name="hb" id="p1" min="0"  max="18" onkeypress="return isNumberKey(event)" maxlength="2" autocomplete="off"  onchange="errorCheck();">
                    <p id="hbError" style="color:red;"></p>
                </div>
                <div class="mb-3 col-3" style="display:block;">
                 <label for="feces" class="form-label">اختبار كاشف الدم الخفي بالبراز :</label>
                 <select name="feces" id="p2" class="form-select w-75 form-control"  >
                     <option value=" ">--اختر--</option>
                     <option value="ايجابي" >ايجابي</option>
                     <option value="سلبي">سلبي </option>
                     <option value="لم يتم">لم يتم </option>
                 </select>
             </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="sight" class="form-label">قياس حدة النظر :</label>
                    <select name="sight" id="p3" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعي" >طبيعي</option>
                        <option value="يحتاج لتدخل">
                            يحتاج لتدخل
                        </option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-3" id="hba cDiv"  style="display:block;">
                    <label for="teeth" class="form-label">تقييم الاسنان  :</label>
                    <select name="teeth" id="p4" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعى" >طبيعي</option>
                        <option value="لا">بحاجه لتدخل في وحدات الرعاية الصحية الاولية</option>
                        <option value="بحاجه لتدخل بالمستشفي">بحاجه لتدخل بالمستشفي
                        </option>
                       
                    </select>
                </div>
			 </div>
            <div class="row">
                <div class="mb-3 col-3 ">
                    <label for="heart" class="form-label">رسم القلب :</label>
                    <select name="heart" id="p5" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="cog" class="form-label">اختبار Mini-Cog للتقييم النفسي :</label>
                    <select name="cog" id="p6" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعى" >طبيعي</option>
                         <option value="متابعة" >يحتاج لمتابعة</option>
                         <option value="تحويل" >تحويل لمستشفى</option>
                    
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="gds" class="form-label">مؤشر GDS للتقييم النفسي :</label>
                    <select name="gds" id="p7" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="0" >0-4</option>
                         <option value="5" >5-10</option>
                         <option value="11" >اكبر من 11</option>
                  
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="must" class="form-label">للتقييم التغذوي MUST اداه  :</label>
                    <select name="must" id="p8" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="0" >0</option>
                        <option value="1">1</option>
                       <option value="2">2 فاكثر</option>
                       
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-3" id="xrayDiv"  style="display:block;">
                    <label for="xray" class="form-label">الموجات فوق صوتيه علي البطن :</label>
                    <select name="xray" id="p9" class="form-select w-75 form-control" onchange="message(); checkGender(); checkAll();">
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>

            </div>
            <div class="row" id="xrays" style="visibility: hidden;">
                <div class="mb-3 col-2" id="liverDiv">
                    <label for="liver" class="form-label">الكبد :</label>
                    <select name="liver" id="liver" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="تليف">تليف بالكبد</option>
                        <option value="دهنى"> دهنى</option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="kidneysDiv">
                    <label for="kidneys" class="form-label">الكلى :</label>
                    <select name="kidneys" id="kidneys" class="form-select form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="wombDiv">
                    <label for="womb" class="form-label">الرحم :</label>
                    <select name="womb" id="womb" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="prostateDiv">
                    <label for="prostate" class="form-label">البروستاتا :</label>
                    <select name="prostate" id="prostate" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-3" id="aortaDiv">
                    <label for="aorta" class="form-label">تضخم بالشريان الاورطي :</label>
                    <select name="aorta" id="aorta" class="form-select w-75 form-control"  onchange="message(); xrays();">
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >نعم</option>
                        <option value="لا">لا</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>



            </div>



            <p id="pa1" style="color:red; font-size: 18px;"></p>
	        <p id="pa2" style="color:red; font-size: 18px;"></p>
            <p id="pa3" style="color:red; font-size: 18px;"></p>
            <p id="pa4" style="color:red; font-size: 18px;"></p>
            <p id="pa5" style="color:red; font-size: 18px;"></p>
	        <p id="pa6" style="color:red; font-size: 18px;"></p>
            <p id="pa7" style="color:red; font-size: 18px;"></p>
            <p id="pa8" style="color:red; font-size: 18px;"></p>
            <p id="pa9" style="color:red; font-size: 18px;"></p>
            <p id="pa10" style="color:red; font-size: 18px;"></p>
             <p id="pa11" style="color:red; font-size: 18px;"></p>
             <p id="pa12" style="color:red; font-size: 18px;"></p>
             <p id="pa13" style="color:red; font-size: 18px;"></p>
            <p id="message" style="color:red; font-size:18px;"></p>
	        <p id="message1" style="color:red; font-size:18px;"></p>
            <p id="message2" style="color:red; font-size:18px;"></p>
            <p id="message3" style="color:red; font-size:18px;"></p>
            
            
    </div>
	   </section>
   <?php   }}
      else if($_SESSION['nationality'] == 'غير مصرى'){
                       $FnationalID = $_SESSION['FnationalId'];
             $query= "SELECT * FROM patients WHERE FnationalId = '$FnationalID' AND FnationalId != '0' limit 1";
    $do= mysqli_query($conn,$query);
    $count= mysqli_num_rows($do);
       $query1= "SELECT * FROM elder WHERE FnationalId = '$FnationalID' AND FnationalId != '0' limit 1";
    $do1= mysqli_query($conn,$query1);
    $count1= mysqli_num_rows($do1);
    if($count >0){
        while($result= mysqli_fetch_array($do)){
             ?>
        <input type="text" style="display:none;" value="<?php echo $_SESSION['name']; ?>" name="location" id="location">
             <input type="text" style="display:none;"  value="<?php echo $_SESSION['qism']; ?>" name="qism" id="qism">   
       <input type="text" style="display:none;"  value="<?php echo $_SESSION['governorate']; ?>" name="gov" id="gov">
<section class="container">
    <div id="form-container" class="container" >
        <h3 id="hntt" style="color:red;"></h3>
        <div class="row">
                <div class="mb-3  col-3">
    <label for="nationality" class="form-label">الجنسية :</label>
    <input type="text" class="form-control w-75" name="nationality" id="nationality" value="<?php echo $result['nationalityc']; ?>" readonly>
  </div>
<div class="mb-3  col-3">
    <label for="nationalId" class="form-label">رقم جواز السفر :</label>
    <input type="text" class="form-control w-75" name="FnationalId" id="FnationalId" value="<?php echo $_SESSION['FnationalId']; ?>" readonly>
  </div> 
         <div class="mb-3 col-6">
    <label for="uname" class="form-label">الاسم رباعى (كما هو مدون بالبطاقة أو وثيقة السفر) :</label>
    <input type="text" class="form-control w-75" name="uname" id="uname" maxlength="50" autocomplete="off"  onkeypress="return CheckArabicCharactersOnly(event);" required value="<?php echo $result['name']; ?>" readonly>
  </div>
        </div>
        <div class="row">
              <div class="mb-3  col-3">
    <label for="gender" class="form-label">النوع :</label>
    <input type="text" class="form-control w-75" name="gender" id="gender" value="<?php echo $result['gender']; ?>" readonly>
  </div>
              <div id="eage" class="mb-3  col-3">
    <label for="age" class="form-label">السن :</label>
    <input type="number" class="form-control w-75" name="age" id="age" value="<?php echo $_SESSION['age']; ?>" readonly>
  </div>
            
            <div class="mb-3 col-3">
    <label for="phone" class="form-label">تليفون :</label>
    <input type="text" class="form-control w-75" name="phone" id="phone" onkeypress="return isNumberKey(event)" onchange="phoneValidation()" minlength="11"  maxlength="11" autocomplete="off" required value="<?php echo $result['mobile']; ?>">
                <p id="phoneError" style="color:red;"></p>
                </div>
         </div>    
    </div>
    <hr>
           
  <h4 class="container-fluid headOfPersonal pb-2" >متابعة زيارات المريض
         <p class="mt-2 h4 font-weight-bold" id="showHide" onclick="toggleForm()">
          <i class="fas fa-chevron-down"></i> 
            </h4>
       <div class="container" id="tableDiv" style="overflow-x:scroll; display:none;">
       
       <table id="tblData" class="table table-striped table-bordered">
	        	<thead>
                    <tr>  
                   
                    <th>تاريخ الزيارة</th>
                    <th>مكان الزيارة</th>
                    <th> مؤشر كتلة الجسم</th>
                    <th>السكر العشوائى</th>
                    <th>ضغط الدم</th> 
                    <th>HbA1c</th>   
                    <th>Triglycerides</th>   
                    <th>HDL</th>  
                    <th>eGFR</th>  
                    <th>LDL</th>
                    <th>Creatinine</th>
                    <th>Total Cholesterol</th>
                    <th>HB</th>  
                    <th>اختبار كاشف الدم الخفى بالبراز</th>  
                    <th>قياس حدة النظر</th>
                    <th>تقييم الأسنان</th>  
                    <th>رسم القلب</th>  
                    <th>اختبار mini-cog للتقييم النفسي</th>
                    <th>مؤشر GDS للتقييم النفسي</th>  
                    <th>اداة MUST للتقيم التغذوى </th>  
                    <th>الموجات فوق صوتيه على البطن </th>
                    <th>الكبد</th>  
                    <th>الكلى</th>
                    <th>الرحم</th>
                    <th>البروستاتا</th> 
                    <th>تضخم بالشريان الاورطى</th>    
                        
                        
                        
                    </tr>    
           </thead>
                    <tbody>
                       <?php 
           
            $pro1 = "SELECT * FROM elder where FnationalId = '$FnationalID' ORDER BY date DESC";
$query1 = mysqli_query( $conn,$pro1) or die('error:'.mysqli_error($conn));
$result1 = mysqli_fetch_array($query1);
            if($result1 > 0){
do{
                        ?>
                        <tr>
           
                        <td> <?php echo $result1['date'];?></td>
                        <td> <?php echo $result1['location'];?></td>
                         <td> <?php echo $result1['BMI'];?></td>
                         <td> <?php echo $result1['diabetesCheck'];?></td>
                         <td> <?php echo $result1['pressure'];?></td>
                           <td> <?php echo $result1['hba'];?></td>
                         <td> <?php echo $result1['triglycerides'];?></td>
                         <td> <?php echo $result1['hdl'];?></td> 
                           <td> <?php echo $result1['egfr'];?></td>
                         <td> <?php echo $result1['ldl'];?></td>
                         <td> <?php echo $result1['creatinine'];?></td>  
                         <td> <?php echo $result1['cholesterol'];?></td>  
                           <td> <?php echo $result1['hb'];?></td>
                         <td> <?php echo $result1['feces'];?></td>
                         <td> <?php echo $result1['sight'];?></td> 
                             <td> <?php echo $result1['teeth'];?></td>
                         <td> <?php echo $result1['heart'];?></td>
                         <td> <?php echo $result1['cog'];?></td> 
                             <td> <?php echo $result1['gds'];?></td>
                         <td> <?php echo $result1['must'];?></td>
                         <td> <?php echo $result1['xray'];?></td> 
                             <td> <?php echo $result1['liver'];?></td>
                         <td> <?php echo $result1['kidneys'];?></td>
                         <td> <?php echo $result1['womb'];?></td> 
                             <td> <?php echo $result1['prostate'];?></td>
                         <td> <?php echo $result1['aorta'];?></td>                   
               
       </tr>   
                        <?php } while($result1=mysqli_fetch_array($query1));
                }
           $pro = "SELECT * FROM patients where FnationalId = '$FnationalID' ORDER BY date DESC";
$query = mysqli_query( $conn,$pro) or die('error:'.mysqli_error($conn));
$result = mysqli_fetch_array($query);
            if($result > 0){
                
            
do{
                        ?>
                        <tr>
                         <td> <?php echo $result['date'];?></td>
                        <td> <?php echo $result['location'];?></td>
                         <td> <?php echo $result['BMI'];?></td>
                         <td> <?php echo $result['diabetesCheck'];?></td>
                         <td> <?php echo $result['pressure'];?></td>
                           <td> <?php echo $result['hba'];?></td>
                         <td> <?php echo $result['triglycerides'];?></td>
                         <td> <?php echo $result['hdl'];?></td> 
                           <td> <?php echo $result['egfr'];?></td>
                         <td> <?php echo $result['ldl'];?></td>
                         <td> <?php echo $result['creatinine'];?></td>  
                         <td> <?php echo $result['cholesterol'];?></td>  
                              <td> </td>
                         <td> </td>
                         <td></td> 
                             <td> </td>
                         <td> </td>
                         <td> </td> 
                             <td> </td>
                         <td> </td>
                         <td> </td> 
                             <td> </td>
                         <td> </td>
                         <td> </td> 
                             <td> </td>
                         <td> </td>
                                                    
               
       </tr>   
                        <?php } while($result=mysqli_fetch_array($query));
                }
            
            
?>
                        
           </tbody>
      
           </table>
        
       </div> 
    <hr>
     <h4 class="container-fluid headOfPersonal mb-2 pb-2" > التاريخ الطبـى (هل يوجد)   
            </h4>
        <div class="form-container-rep text-right pr-3" style="background-color:#eeeeee;">
            <div class="row pt-2 mb-4">
             <div  class="mb-3 col-3">
    <label for="diabetes" class="form-label"> إصابة بمرض السكر :</label>
    <select name="diabetes" id="diabetes" class="form-select w-75 form-control" onfocus="noneDiabetes();" onchange="Check()">
      <option value=" "  >--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select> 
  </div>        
                
                
               <div  class="mb-3 col-3">
    <label for="bloodpressure" class="form-label">إصابة بمرض ضغط الدم :</label>
    <select name="bloodpressure" id="bloodpressure" class="form-select w-75 form-control" onchange="Check()">
      <option value=" "  >--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>     
  </div>        
             <div  class="mb-3 col-3">
    <label for="heartdisease" class="form-label">إصابة بأمراض القلب :</label>
    <select name="heartdisease" id="heartdisease" class="form-select w-75 form-control" >
      <option value=" ">--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>  
  </div>        
<div  class="mb-3 col-3">
    <label for="smoking" class="form-label">التدخين :</label>
    <select name="smoking" id="smoking" class="form-select w-75 form-control" onchange="checkAll();">
      <option value=" ">--اختر--</option>
       <option value="مدخن" >مدخن</option>
         <option value="غير مدخن">غير مدخن</option>
         <option value="مدخن سابق">مدخن سابق</option>
    </select> 
  </div>        
            </div>
            </div>
   
    
     <hr>

  <h4 class="container-fluid headOfPersonal mb-2 pb-2" >الفحوصات الطبية 
            </h4>
        <div class="form-container-rep text-right pr-3" style="background-color:#eeeeee;">
               <div class="row pb-3 pt-3">
                    <div class="mb-3 col-3" >
    <label for="pressureeCheck" class="form-label">الضغط :</label><br>
    <input type="number" class="form-control  d-inline" name="systolic" id="systolic" placeholder="systolic" autocomplete="off" onchange="errorCheck();" min="60" max="260" style="width:45%;"  required> <span class="font-weight-bold">/</span>
    <input type="number"  class="form-control  d-inline" name="diastolic" id="diastolic" placeholder="diastolic" autocomplete="off" onchange="errorCheck();" min="30" max="150" style="width:47%;" required>
                        <p id="pressureError" style=" color:red;"></p>
  </div> 
               <div class="mb-3 pt-  col-3 ">
    <label for="height" class="form-label"> الطول(سم):</label>
    <input type="number" class="form-control w-75 " name="height" id="height" min="50"  max="300" onkeypress="return isNumberKey(event)" maxlength="3" autocomplete="off" onchange="errorCheck();" required>
    <p id="heightError" style=" color:red;"></p>
  </div> 
         <div class="mb-3 col-3 ">
    <label for="weight" class="form-label"> الوزن(كجم) :</label>
    <input type="number" class="form-control w-75" name="weight" id="weight" min="40"  max="250" onkeypress="return isNumberKey(event)" maxlength="3" onchange="bmiCalculate(); errorCheck(); " autocomplete="off" required>
             <p id="weightError"  style="color:red;"></p>
						 </div> 
   
                   
                     <div id="bmiDiv" class="mb-3 col-3" style="display:none;">
    <label for="bmi" class="form-label"> مؤشر كتلة الجسم:</label>
<p id="bmi" name="bmi" style="width:200px; height:40px; background-color:white;  border-radius: 5px; border:2px solid #FBE6C2; padding-top:8px; padding-bottom:8px; padding-right:2px; color:black;" maxlength="5"></p>
     
  </div>    
                    </div>
           
            <div class="row">
                 <div class="mb-3 col-3 ">
                    <label for="diabetesCheck" class="form-label"> فحص السكر(العشوائى) :</label>
                    <input type="number" class="form-control w-75" name="diabetesCheck" id="diabetesCheck" min="7"  max="600" onkeypress="return isNumberKey(event)" maxlength="4" autocomplete="off" onchange="errorCheck();" required>
                    <p id="diabetesError" style="color:red;"></p>
                </div>
            
                <div id="egfrDiv" class="mb-3 col-3 " style="display:block;">
                    <label for="egrf" class="form-label">eGFR :</label>
                    <input type="number" class="form-control w-75" name="egrf" id="egrf"  onkeypress="return isNumberKey(event)" maxlength="2" autocomplete="off" onchange="errorCheck();">

                </div>
                <div id="creatinineDiv" class="mb-3 col-3 " style="display:block;">
                    <label for="creatinine" class="form-label">Creatinine :</label>
                    <input type="text" class="form-control w-75" name="creatinine" id="creatinine" min="0.1" max="15"  maxlength="4" autocomplete="off"  onchange="errorCheck();">
                    <p id="creatinineError" style="color:red;"></p>
                </div>
            </div>


            <div class="row">
                <div class="mb-3 col-3 ">
                    <label for="hb" class="form-label"> HB
                        :</label>
                    <input type="number" class="form-control w-75" name="hb" id="p1" min="0"  max="18" onkeypress="return isNumberKey(event)" maxlength="2" autocomplete="off"  onchange="errorCheck();">
                    <p id="hbError" style="color:red;"></p>
                </div>
                <div class="mb-3 col-3" style="display:block;">
                 <label for="feces" class="form-label">اختبار كاشف الدم الخفي بالبراز :</label>
                 <select name="feces" id="p2" class="form-select w-75 form-control"  >
                     <option value=" ">--اختر--</option>
                     <option value="ايجابي" >ايجابي</option>
                     <option value="سلبي">سلبي </option>
                     <option value="لم يتم">لم يتم </option>
                    
                 </select>
             </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="sight" class="form-label">قياس حدة النظر :</label>
                    <select name="sight" id="p3" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعي" >طبيعي</option>
                        <option value="يحتاج لتدخل">
                            يحتاج لتدخل
                        </option>
                        
                                             <option value="لم يتم">لم يتم </option>

                    </select>
                </div>
                <div class="mb-3 col-3" id="hba cDiv"  style="display:block;">
                    <label for="teeth" class="form-label">تقييم الاسنان  :</label>
                    <select name="teeth" id="p4" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعى" >طبيعي</option>
                        <option value="لا">بحاجه لتدخل في وحدات الرعاية الصحية الاولية</option>
                        <option value="بحاجه لتدخل بالمستشفي">بحاجه لتدخل بالمستشفي
                        </option>

                    </select>
                </div>
			 </div>
            <div class="row">
                <div class="mb-3 col-3 ">
                    <label for="heart" class="form-label">رسم القلب :</label>
                    <select name="heart" id="p5" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
                        <option value="لم يتم">لم يتم </option>               
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="cog" class="form-label">اختبار Mini-Cog للتقييم النفسي :</label>
                    <select name="cog" id="p6" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعى" >طبيعي</option>
                         <option value="متابعة" >يحتاج لمتابعة</option>
                         <option value="تحويل" >تحويل لمستشفى</option>

                       
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="gds" class="form-label">مؤشر GDS للتقييم النفسي :</label>
                    <select name="gds" id="p7" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="0" >0-4</option>
                         <option value="5" >5-10</option>
                         <option value="11" >اكبر من 11</option>
                   
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="must" class="form-label">للتقييم التغذوي MUST اداه  :</label>
                    <select name="must" id="p8" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="0" >0</option>
                        <option value="1">1</option>
                        <option value="2">2 فاكثر</option>
             
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-3" id="xrayDiv"  style="display:block;">
                    <label for="xray" class="form-label">الموجات فوق صوتيه علي البطن :</label>
                    <select name="xray" id="p9" class="form-select w-75 form-control" onchange="message(); checkGender1();">
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
            </div>
            <div class="row" id="xrays" style="visibility: hidden;">
                <div class="mb-3 col-2" id="liverDiv">
                    <label for="liver" class="form-label">الكبد :</label>
                    <select name="liver" id="liver" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="تليف">تليف بالكبد</option>
                        <option value="دهنى"> دهنى</option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="kidneysDiv">
                    <label for="kidneys" class="form-label">الكلى :</label>
                    <select name="kidneys" id="kidneys" class="form-select form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="wombDiv">
                    <label for="womb" class="form-label">الرحم :</label>
                    <select name="womb" id="womb" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="prostateDiv">
                    <label for="prostate" class="form-label">البروستاتا :</label>
                    <select name="prostate" id="prostate" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-3" id="aortaDiv">
                    <label for="aorta" class="form-label">تضخم بالشريان الاورطي :</label>
                    <select name="aorta" id="aorta" class="form-select w-75 form-control"  onchange="message(); xrays();">
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >نعم</option>
                        <option value="لا">لا</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
            </div>
            <p id="pa1" style="color:red; font-size: 18px;"></p>
	        <p id="pa2" style="color:red; font-size: 18px;"></p>
            <p id="pa3" style="color:red; font-size: 18px;"></p>
            <p id="pa4" style="color:red; font-size: 18px;"></p>
            <p id="pa5" style="color:red; font-size: 18px;"></p>
	        <p id="pa6" style="color:red; font-size: 18px;"></p>
            <p id="pa7" style="color:red; font-size: 18px;"></p>
            <p id="pa8" style="color:red; font-size: 18px;"></p>
            <p id="pa9" style="color:red; font-size: 18px;"></p>
            <p id="pa10" style="color:red; font-size: 18px;"></p>
             <p id="pa11" style="color:red; font-size: 18px;"></p>
             <p id="pa12" style="color:red; font-size: 18px;"></p>
             <p id="pa13" style="color:red; font-size: 18px;"></p>
            <p id="message" style="color:red; font-size:18px;"></p>
	        <p id="message1" style="color:red; font-size:18px;"></p>
            <p id="message2" style="color:red; font-size:18px;"></p>
            <p id="message3" style="color:red; font-size:18px;"></p>
            
            
    </div>
	   </section>

       <?php
        }}
      else if($count1 > 0){
          while($result1= mysqli_fetch_array($do1)){
             ?>
        <input type="text" style="display:none;" value="<?php echo $_SESSION['name']; ?>" name="location" id="location">
             <input type="text" style="display:none;"  value="<?php echo $_SESSION['qism']; ?>" name="qism" id="qism">   
       <input type="text" style="display:none;"  value="<?php echo $_SESSION['governorate']; ?>" name="gov" id="gov">
<section class="container">
    <div id="form-container" class="container" >
        <h3 id="hntt" style="color:red;"></h3>
        <div class="row">
                <div class="mb-3  col-3">
    <label for="nationality" class="form-label">الجنسية :</label>
    <input type="text" class="form-control w-75" name="nationality" id="nationality" value="<?php echo $result1['nationalityc']; ?>" readonly>
  </div>
<div class="mb-3  col-3">
    <label for="nationalId" class="form-label">الرقم القومى :</label>
    <input type="text" class="form-control w-75" name="FnationalId" id="FnationalId" value="<?php echo $_SESSION['FnationalId']; ?>" readonly>
  </div> 
         <div class="mb-3 col-6">
    <label for="uname" class="form-label">الاسم رباعى (كما هو مدون بالبطاقة أو وثيقة السفر) :</label>
    <input type="text" class="form-control w-75" name="uname" id="uname" maxlength="50" autocomplete="off"  onkeypress="return CheckArabicCharactersOnly(event);" required value="<?php echo $result1['name']; ?>" readonly>
  </div>
        </div>
        <div class="row">
              <div class="mb-3  col-3">
    <label for="gender" class="form-label">النوع :</label>
    <input type="text" class="form-control w-75" name="gender" id="gender" value="<?php echo $result1['gender']; ?>" readonly>
  </div>
              <div id="eage" class="mb-3  col-3">
    <label for="age" class="form-label">السن :</label>
    <input type="number" class="form-control w-75" name="age" id="age" value="<?php echo $_SESSION['age']; ?>" readonly>
  </div>
            
            <div class="mb-3 col-3">
    <label for="phone" class="form-label">تليفون :</label>
    <input type="text" class="form-control w-75" name="phone" id="phone" onkeypress="return isNumberKey(event)" onchange="phoneValidation()" minlength="11" maxlength="11" autocomplete="off" required value="<?php echo $result1['mobile']; ?>">
                <p id="phoneError" style="color:red;"></p>
                </div>
         </div>    
    </div>
    
            <hr>
  <h4 class="container-fluid headOfPersonal pb-2" >متابعة زيارات المريض
         <p class="mt-2 h4 font-weight-bold" id="showHide" onclick="toggleForm()">
          <i class="fas fa-chevron-down"></i> 
            </h4>
       <div class="container" id="tableDiv" style="overflow-x:scroll; display:none;">
       
       <table id="tblData" class="table table-striped table-bordered">
	        	<thead>
                    <tr>  
                   
                    <th>تاريخ الزيارة</th>
                    <th>مكان الزيارة</th>
                    <th> مؤشر كتلة الجسم</th>
                    <th>السكر العشوائى</th>
                    <th>ضغط الدم</th> 
                    <th>HbA1c</th>   
                    <th>Triglycerides</th>   
                    <th>HDL</th>  
                    <th>eGFR</th>  
                    <th>LDL</th>
                    <th>Creatinine</th>
                    <th>Total Cholesterol</th>
                    <th>HB</th>  
                    <th>اختبار كاشف الدم الخفى بالبراز</th>  
                    <th>قياس حدة النظر</th>
                    <th>تقييم الأسنان</th>  
                    <th>رسم القلب</th>  
                    <th>اختبار mini-cog للتقييم النفسي</th>
                    <th>مؤشر GDS للتقييم النفسي</th>  
                    <th>اداة MUST للتقيم التغذوى </th>  
                    <th>الموجات فوق صوتيه على البطن </th>
                    <th>الكبد</th>  
                    <th>الكلى</th>
                    <th>الرحم</th>
                    <th>البروستاتا</th> 
                    <th>تضخم بالشريان الاورطى</th>    
                        
                        
                        
                    </tr>    
           </thead>
                    <tbody>
                       <?php 
           
            $pro1 = "SELECT * FROM elder where FnationalId = '$FnationalID' ORDER BY date DESC";
$query1 = mysqli_query( $conn,$pro1) or die('error:'.mysqli_error($conn));
$result1 = mysqli_fetch_array($query1);
            if($result1 > 0){
do{
                        ?>
                        <tr>
           
                                  <td> <?php echo $result1['date'];?></td>
                        <td> <?php echo $result1['location'];?></td>
                         <td> <?php echo $result1['BMI'];?></td>
                         <td> <?php echo $result1['diabetesCheck'];?></td>
                         <td> <?php echo $result1['pressure'];?></td>
                           <td> <?php echo $result1['hba'];?></td>
                         <td> <?php echo $result1['triglycerides'];?></td>
                         <td> <?php echo $result1['hdl'];?></td> 
                           <td> <?php echo $result1['egfr'];?></td>
                         <td> <?php echo $result1['ldl'];?></td>
                         <td> <?php echo $result1['creatinine'];?></td>  
                         <td> <?php echo $result1['cholesterol'];?></td>  
                           <td> <?php echo $result1['hb'];?></td>
                         <td> <?php echo $result1['feces'];?></td>
                         <td> <?php echo $result1['sight'];?></td> 
                             <td> <?php echo $result1['teeth'];?></td>
                         <td> <?php echo $result1['heart'];?></td>
                         <td> <?php echo $result1['cog'];?></td> 
                             <td> <?php echo $result1['gds'];?></td>
                         <td> <?php echo $result1['must'];?></td>
                         <td> <?php echo $result1['xray'];?></td> 
                             <td> <?php echo $result1['liver'];?></td>
                         <td> <?php echo $result1['kidneys'];?></td>
                         <td> <?php echo $result1['womb'];?></td> 
                             <td> <?php echo $result1['prostate'];?></td>
                         <td> <?php echo $result1['aorta'];?></td>                   
               
       </tr>   
                        <?php } while($result1=mysqli_fetch_array($query1));
                }
           $pro = "SELECT * FROM patients where FnationalId = '$FnationalID' ORDER BY date DESC";
$query = mysqli_query( $conn,$pro) or die('error:'.mysqli_error($conn));
$result = mysqli_fetch_array($query);
            if($result > 0){
                
            
do{
                        ?>
                        <tr>
                         <td> <?php echo $result['date'];?></td>
                        <td> <?php echo $result['location'];?></td>
                         <td> <?php echo $result['BMI'];?></td>
                         <td> <?php echo $result['diabetesCheck'];?></td>
                         <td> <?php echo $result['pressure'];?></td>
                           <td> <?php echo $result['hba'];?></td>
                         <td> <?php echo $result['triglycerides'];?></td>
                         <td> <?php echo $result['hdl'];?></td> 
                           <td> <?php echo $result['egfr'];?></td>
                         <td> <?php echo $result['ldl'];?></td>
                         <td> <?php echo $result['creatinine'];?></td>  
                         <td> <?php echo $result['cholesterol'];?></td>  
                              <td> </td>
                         <td> </td>
                         <td></td> 
                             <td> </td>
                         <td> </td>
                         <td> </td> 
                             <td> </td>
                         <td> </td>
                         <td> </td> 
                             <td> </td>
                         <td> </td>
                         <td> </td> 
                             <td> </td>
                         <td> </td>
                                                    
               
       </tr>   
                        <?php } while($result=mysqli_fetch_array($query));
                }
            
            
?>
                        
           </tbody>
      
           </table>
        
       </div> 
    <hr>
     <h4 class="container-fluid headOfPersonal mb-2 pb-2" > التاريخ الطبـى (هل يوجد)   
            </h4>
        <div class="form-container-rep text-right pr-3" style="background-color:#eeeeee;">
            <div class="row pt-2 mb-4">
             <div  class="mb-3 col-3">
    <label for="diabetes" class="form-label"> إصابة بمرض السكر :</label>
    <select name="diabetes" id="diabetes" class="form-select w-75 form-control" onchange="Check()">
      <option value=" "  >--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select> 
  </div>        
                
                
               <div  class="mb-3 col-3">
    <label for="bloodpressure" class="form-label">إصابة بمرض ضغط الدم :</label>
    <select name="bloodpressure" id="bloodpressure" class="form-select w-75 form-control" onchange=" Check()" >
      <option value=" ">--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>     
  </div>        
             <div  class="mb-3 col-3">
    <label for="heartdisease" class="form-label">إصابة بأمراض القلب :</label>
    <select name="heartdisease" id="heartdisease" class="form-select w-75 form-control" >
      <option value=" ">--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>  
  </div>        
<div  class="mb-3 col-3">
    <label for="smoking" class="form-label">التدخين :</label>
    <select name="smoking" id="smoking" class="form-select w-75 form-control" onchange="checkAll();">
      <option value="  ">--اختر--</option>
       <option value="مدخن" >مدخن</option>
         <option value="غير مدخن">غير مدخن</option>
         <option value="مدخن سابق">مدخن سابق</option>
    </select> 
  </div>        
            </div>
            </div>
   
    
     <hr>

  <h4 class="container-fluid headOfPersonal mb-2 pb-2" >الفحوصات الطبية 
            </h4>
        <div class="form-container-rep text-right pr-3" style="background-color:#eeeeee;">
               <div class="row pb-3 pt-3">
                    <div class="mb-3 col-3" >
    <label for="pressureeCheck" class="form-label">الضغط :</label><br>
    <input type="number" class="form-control  d-inline" name="systolic" id="systolic" placeholder="systolic" autocomplete="off" onchange="errorCheck();" min="60" max="260" style="width:45%;"  required> <span class="font-weight-bold">/</span>
    <input type="number"  class="form-control  d-inline" name="diastolic" id="diastolic" placeholder="diastolic" autocomplete="off" onchange="errorCheck();" min="30" max="150" style="width:47%;" required>
                        <p id="pressureError" style=" color:red;"></p>
  </div> 
               <div class="mb-3 pt-  col-3 ">
    <label for="height" class="form-label"> الطول(سم):</label>
    <input type="number" class="form-control w-75 " name="height" id="height" min="50"  max="300" onkeypress="return isNumberKey(event)" maxlength="3" autocomplete="off" onchange="errorCheck(); " required>
    <p id="heightError" style=" color:red;"></p>
  </div> 
         <div class="mb-3 col-3 ">
    <label for="weight" class="form-label"> الوزن(كجم) :</label>
    <input type="number" class="form-control w-75" name="weight" id="weight" min="40"  max="250" onkeypress="return isNumberKey(event)" maxlength="3" onchange="bmiCalculate(); errorCheck(); " autocomplete="off" required>
             <p id="weightError"  style="color:red;"></p>
						 </div> 
   
                   
                     <div id="bmiDiv" class="mb-3 col-3" style="display:none;">
    <label for="bmi" class="form-label"> مؤشر كتلة الجسم:</label>
<p id="bmi" name="bmi" style="width:200px; height:40px; background-color:white;  border-radius: 5px; border:2px solid #FBE6C2; padding-top:8px; padding-bottom:8px; padding-right:2px; color:black;" maxlength="5"></p>
     
  </div>    
                    </div>
           
            <div class="row">
                 <div class="mb-3 col-3 ">
                    <label for="diabetesCheck" class="form-label"> فحص السكر(العشوائى) :</label>
                    <input type="number" class="form-control w-75" name="diabetesCheck" id="diabetesCheck" min="7"  max="600" onkeypress="return isNumberKey(event)" maxlength="4" autocomplete="off" onchange="errorCheck();" required>
                    <p id="diabetesError" style="color:red;"></p>
                </div>
             

                <div id="egfrDiv" class="mb-3 col-3 " style="display:block;">
                    <label for="egrf" class="form-label">eGFR :</label>
                    <input type="number" class="form-control w-75" name="egrf" id="egrf"  onkeypress="return isNumberKey(event)" maxlength="2" autocomplete="off" onchange="errorCheck();">

                </div>
                <div id="creatinineDiv" class="mb-3 col-3 " style="display:block;">
                    <label for="creatinine" class="form-label">Creatinine :</label>
                    <input type="text" class="form-control w-75" name="creatinine" id="creatinine" min="0.1" max="15"  maxlength="4" autocomplete="off"  onchange="errorCheck();">
                    <p id="creatinineError" style="color:red;"></p>
                </div>
            </div>

         

            <div class="row">
                <div class="mb-3 col-3 ">
                    <label for="hb" class="form-label"> HB
                        :</label>
                    <input type="number" class="form-control w-75" name="hb" id="p1" min="0"  max="18" onkeypress="return isNumberKey(event)" maxlength="2" autocomplete="off"  onchange="errorCheck();">
                    <p id="hbError" style="color:red;"></p>
                </div>
                <div class="mb-3 col-3" style="display:block;">
                 <label for="feces" class="form-label">اختبار كاشف الدم الخفي بالبراز :</label>
                 <select name="feces" id="p2" class="form-select w-75 form-control"  >
                     <option value=" ">--اختر--</option>
                     <option value="ايجابي" >ايجابي</option>
                     <option value="سلبي">سلبي </option>
                     <option value="لم يتم">لم يتم </option>
                 </select>
             </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="sight" class="form-label">قياس حدة النظر :</label>
                    <select name="sight" id="p3" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعي" >طبيعي</option>
                        <option value="يحتاج لتدخل">
                            يحتاج لتدخل
                        </option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-3" id="hba cDiv"  style="display:block;">
                    <label for="teeth" class="form-label">تقييم الاسنان  :</label>
                    <select name="teeth" id="p4" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعى" >طبيعي</option>
                        <option value="لا">بحاجه لتدخل في وحدات الرعاية الصحية الاولية</option>
                        <option value="بحاجه لتدخل بالمستشفي">بحاجه لتدخل بالمستشفي
                        </option>
                       
                    </select>
                </div>
			 </div>
            <div class="row">
                <div class="mb-3 col-3 ">
                    <label for="heart" class="form-label">رسم القلب :</label>
                    <select name="heart" id="p5" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="cog" class="form-label">اختبار Mini-Cog للتقييم النفسي :</label>
                    <select name="cog" id="p6" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعى" >طبيعي</option>
                         <option value="متابعة" >يحتاج لمتابعة</option>
                         <option value="تحويل" >تحويل لمستشفى</option>
                    
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="gds" class="form-label">مؤشر GDS للتقييم النفسي :</label>
                    <select name="gds" id="p7" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="0" >0-4</option>
                         <option value="5" >5-10</option>
                         <option value="11" >اكبر من 11</option>
                  
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="must" class="form-label">للتقييم التغذوي MUST اداه  :</label>
                    <select name="must" id="p8" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="0" >0</option>
                        <option value="1">1</option>
                       <option value="2">2 فاكثر</option>
                       
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-3" id="xrayDiv"  style="display:block;">
                    <label for="xray" class="form-label">الموجات فوق صوتيه علي البطن :</label>
                    <select name="xray" id="p9" class="form-select w-75 form-control" onchange="message(); checkGender1(); checkAll();">
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>

            </div>
            <div class="row" id="xrays" style="visibility: hidden;">
                <div class="mb-3 col-2" id="liverDiv">
                    <label for="liver" class="form-label">الكبد :</label>
                    <select name="liver" id="liver" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="تليف">تليف بالكبد</option>
                        <option value="دهنى"> دهنى</option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="kidneysDiv">
                    <label for="kidneys" class="form-label">الكلى :</label>
                    <select name="kidneys" id="kidneys" class="form-select form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="wombDiv">
                    <label for="womb" class="form-label">الرحم :</label>
                    <select name="womb" id="womb" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="prostateDiv">
                    <label for="prostate" class="form-label">البروستاتا :</label>
                    <select name="prostate" id="prostate" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-3" id="aortaDiv">
                    <label for="aorta" class="form-label">تضخم بالشريان الاورطي :</label>
                    <select name="aorta" id="aorta" class="form-select w-75 form-control"  onchange="message(); xrays();">
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >نعم</option>
                        <option value="لا">لا</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>



            </div>



            <p id="pa1" style="color:red; font-size: 18px;"></p>
	        <p id="pa2" style="color:red; font-size: 18px;"></p>
            <p id="pa3" style="color:red; font-size: 18px;"></p>
            <p id="pa4" style="color:red; font-size: 18px;"></p>
            <p id="pa5" style="color:red; font-size: 18px;"></p>
	        <p id="pa6" style="color:red; font-size: 18px;"></p>
            <p id="pa7" style="color:red; font-size: 18px;"></p>
            <p id="pa8" style="color:red; font-size: 18px;"></p>
            <p id="pa9" style="color:red; font-size: 18px;"></p>
            <p id="pa10" style="color:red; font-size: 18px;"></p>
             <p id="pa11" style="color:red; font-size: 18px;"></p>
             <p id="pa12" style="color:red; font-size: 18px;"></p>
             <p id="pa13" style="color:red; font-size: 18px;"></p>
            <p id="message" style="color:red; font-size:18px;"></p>
	        <p id="message1" style="color:red; font-size:18px;"></p>
            <p id="message2" style="color:red; font-size:18px;"></p>
            <p id="message3" style="color:red; font-size:18px;"></p>
            
            
    </div>
	   </section>
       
     <?php
          }}
      else if ($count1 != 1 || $count != 1){
          ?>
          <input type="text" style="display:none;" value="<?php echo $_SESSION['name']; ?>" name="location" id="location">
             <input type="text" style="display:none;"  value="<?php echo $_SESSION['qism']; ?>" name="qism" id="qism">   
       <input type="text" style="display:none;"  value="<?php echo $_SESSION['governorate']; ?>" name="gov" id="gov">
<section class="container">
    <div id="form-container" class="container" >
        <h3 id="hntt" style="color:red;"></h3>
        <div class="row">
                <div class="mb-3  col-3">
    <label for="nationality" class="form-label">الجنسية :</label>
    <input type="text" class="form-control w-75" name="nationality" id="nationality" value="<?php echo $_SESSION['nationality']; ?>" readonly>
  </div>
        </div>
        <div class="row">
            <div id="fcountry" class="mb-3 col-3">
    <label for="country" class="form-label">بلد الجنسية :</label>
    <select name="country" id="country" class="form-select w-75 form-control" >
      <option value=" "  selected>--اختر بلد الجنسية--</option>
        <?php
       $query= "select * from country";
       $do= mysqli_query($conn,$query)or die('error'.mysqli_error($conn));
       while($row=mysqli_fetch_array($do)){
      echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
       }
       ?>
    </select>                               
  </div>
<div class="mb-3  col-3">
    <label for="nationalId" class="form-label">رقم جواز السفر :</label>
    <input type="text" class="form-control w-75" name="FnationalId" id="FnationalId" value="<?php echo $_SESSION['FnationalId']; ?>" readonly>
    <p id="idError" style="color:red;"></p>
  </div> 
         <div class="mb-3 col-6">
    <label for="uname" class="form-label">الاسم رباعى (كما هو مدون بالبطاقة أو وثيقة السفر) :</label>
    <input type="text" class="form-control w-75" name="uname" id="uname" maxlength="50" autocomplete="off"  onkeypress="return CheckArabicCharactersOnly(event);" required >
  </div>
        </div>
        <div class="row">
       <div class="form-check col-3">
                <label class="form-check-label pt-2 pl-2">النوع : </label>
               <input  type="radio" name="gender" id="male" value="ذكر" >
                <label class="ml-3"  for="male"> ذكر </label><br>
           <label class="form-check-label pl-2" style="visibility:hidden;">النوع : </label>
              <input  type="radio" name="gender" id="female" value="أنثى">
             <label for="female">أنثى</label>
            </div>
            
              <div id="eage" class="mb-3  col-3">
    <label for="age" class="form-label">السن :</label>
    <input type="number" class="form-control w-75" name="age" id="age" value="<?php echo $_SESSION['age']; ?>" readonly>
  </div>
            
            <div class="mb-3 col-3">
    <label for="phone" class="form-label">تليفون :</label>
<input type="text" class="form-control w-75" name="phone" id="phone" onkeypress="return isNumberKey(event)" onchange="phoneValidation()" minlength="11" maxlength="11" autocomplete="off" required>
                <p id="phoneError" style="color:red;"></p>
                </div>
         </div>    
    </div>
    
            <hr>
     <h4 class="container-fluid headOfPersonal mb-2 pb-2" > التاريخ الطبـى (هل يوجد)   
            </h4>
        <div class="form-container-rep text-right pr-3" style="background-color:#eeeeee;">
            <div class="row pt-2 mb-4">
             <div  class="mb-3 col-3">
    <label for="diabetes" class="form-label"> إصابة بمرض السكر :</label>
    <select name="diabetes" id="diabetes" class="form-select w-75 form-control" onchange="Check()">
      <option value=" "  >--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select> 
  </div>        
                
                
               <div  class="mb-3 col-3">
    <label for="bloodpressure" class="form-label">إصابة بمرض ضغط الدم :</label>
    <select name="bloodpressure" id="bloodpressure" class="form-select w-75 form-control" onchange=" Check()" >
      <option value=" ">--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>     
  </div>        
             <div  class="mb-3 col-3">
    <label for="heartdisease" class="form-label">إصابة بأمراض القلب :</label>
    <select name="heartdisease" id="heartdisease" class="form-select w-75 form-control" >
      <option value=" ">--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>  
  </div>        
<div  class="mb-3 col-3">
    <label for="smoking" class="form-label">التدخين :</label>
    <select name="smoking" id="smoking" class="form-select w-75 form-control" onchange="checkAll();">
      <option value="  ">--اختر--</option>
       <option value="مدخن" >مدخن</option>
         <option value="غير مدخن">غير مدخن</option>
         <option value="مدخن سابق">مدخن سابق</option>
    </select> 
  </div>        
            </div>
            </div>
   
    
     <hr>

  <h4 class="container-fluid headOfPersonal mb-2 pb-2" >الفحوصات الطبية 
            </h4>
        <div class="form-container-rep text-right pr-3" style="background-color:#eeeeee;">
               <div class="row pb-3 pt-3">
                    <div class="mb-3 col-3" >
    <label for="pressureeCheck" class="form-label">الضغط :</label><br>
    <input type="number" class="form-control  d-inline" name="systolic" id="systolic" placeholder="systolic" autocomplete="off" onchange="errorCheck();" min="60" max="260" style="width:45%;"  required> <span class="font-weight-bold">/</span>
    <input type="number"  class="form-control  d-inline" name="diastolic" id="diastolic" placeholder="diastolic" autocomplete="off" onchange="errorCheck();" min="30" max="150" style="width:47%;" required>
                        <p id="pressureError" style=" color:red;"></p>
  </div> 
               <div class="mb-3 pt-  col-3 ">
    <label for="height" class="form-label"> الطول(سم):</label>
    <input type="number" class="form-control w-75 " name="height" id="height" min="50"  max="300" onkeypress="return isNumberKey(event)" maxlength="3" autocomplete="off" onchange="errorCheck(); " required>
    <p id="heightError" style=" color:red;"></p>
  </div> 
         <div class="mb-3 col-3 ">
    <label for="weight" class="form-label"> الوزن(كجم) :</label>
    <input type="number" class="form-control w-75" name="weight" id="weight" min="40"  max="250" onkeypress="return isNumberKey(event)" maxlength="3" onchange="bmiCalculate(); errorCheck(); " autocomplete="off" required>
             <p id="weightError"  style="color:red;"></p>
						 </div> 
   
                   
                     <div id="bmiDiv" class="mb-3 col-3" style="display:none;">
    <label for="bmi" class="form-label"> مؤشر كتلة الجسم:</label>
<p id="bmi" name="bmi" style="width:200px; height:40px; background-color:white;  border-radius: 5px; border:2px solid #FBE6C2; padding-top:8px; padding-bottom:8px; padding-right:2px; color:black;" maxlength="5"></p>
     
  </div>    
                    </div>
           
            <div class="row">
                 <div class="mb-3 col-3 ">
                    <label for="diabetesCheck" class="form-label"> فحص السكر(العشوائى) :</label>
                    <input type="number" class="form-control w-75" name="diabetesCheck" id="diabetesCheck" min="7"  max="600" onkeypress="return isNumberKey(event)" maxlength="4" autocomplete="off" onchange="errorCheck();" required>
                    <p id="diabetesError" style="color:red;"></p>
                </div>
                <div id="egfrDiv" class="mb-3 col-3 " style="display:block;">
                    <label for="egrf" class="form-label">eGFR :</label>
                    <input type="number" class="form-control w-75" name="egrf" id="egrf"  onkeypress="return isNumberKey(event)" maxlength="2" autocomplete="off" onchange="errorCheck();">

                </div>
                <div id="creatinineDiv" class="mb-3 col-3 " style="display:block;">
                    <label for="creatinine" class="form-label">Creatinine :</label>
                    <input type="text" class="form-control w-75" name="creatinine" id="creatinine" min="0.1" max="15"  maxlength="4" autocomplete="off"  onchange="errorCheck();">
                    <p id="creatinineError" style="color:red;"></p>
                </div>
            </div>

     

            <div class="row">
                <div class="mb-3 col-3 ">
                    <label for="hb" class="form-label"> HB
                        :</label>
                    <input type="number" class="form-control w-75" name="hb" id="p1" min="0"  max="18" onkeypress="return isNumberKey(event)" maxlength="2" autocomplete="off"  onchange="errorCheck();">
                    <p id="hbError" style="color:red;"></p>
                </div>
                <div class="mb-3 col-3" style="display:block;">
                 <label for="feces" class="form-label">اختبار كاشف الدم الخفي بالبراز :</label>
                 <select name="feces" id="p2" class="form-select w-75 form-control"  >
                     <option value=" ">--اختر--</option>
                     <option value="ايجابي" >ايجابي</option>
                     <option value="سلبي">سلبي </option>
                     <option value="لم يتم">لم يتم </option>
                 </select>
             </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="sight" class="form-label">قياس حدة النظر :</label>
                    <select name="sight" id="p3" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعي" >طبيعي</option>
                        <option value="يحتاج لتدخل">
                            يحتاج لتدخل
                        </option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-3" id="hba cDiv"  style="display:block;">
                    <label for="teeth" class="form-label">تقييم الاسنان  :</label>
                    <select name="teeth" id="p4" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعى" >طبيعي</option>
                        <option value="لا">بحاجه لتدخل في وحدات الرعاية الصحية الاولية</option>
                        <option value="بحاجه لتدخل بالمستشفي">بحاجه لتدخل بالمستشفي
                        </option>
                       
                    </select>
                </div>
			 </div>
            <div class="row">
                <div class="mb-3 col-3 ">
                    <label for="heart" class="form-label">رسم القلب :</label>
                    <select name="heart" id="p5" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="cog" class="form-label">اختبار Mini-Cog للتقييم النفسي :</label>
                    <select name="cog" id="p6" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="طبيعى" >طبيعي</option>
                         <option value="متابعة" >يحتاج لمتابعة</option>
                         <option value="تحويل" >تحويل لمستشفى</option>
                    
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="gds" class="form-label">مؤشر GDS للتقييم النفسي :</label>
                    <select name="gds" id="p7" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="0" >0-4</option>
                         <option value="5" >5-10</option>
                         <option value="11" >اكبر من 11</option>
                  
                    </select>
                </div>
                <div class="mb-3 col-3" id="hbacDiv"  style="display:block;">
                    <label for="must" class="form-label">للتقييم التغذوي MUST اداه  :</label>
                    <select name="must" id="p8" class="form-select w-75 form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="0" >0</option>
                        <option value="1">1</option>
                       <option value="2">2 فاكثر</option>
                       
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-3" id="xrayDiv"  style="display:block;">
                    <label for="xray" class="form-label">الموجات فوق صوتيه علي البطن :</label>
                    <select name="xray" id="p9" class="form-select w-75 form-control" onchange="message(); checkGender(); checkAll();">
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>

            </div>
            <div class="row" id="xrays" style="visibility: hidden;">
                <div class="mb-3 col-2" id="liverDiv">
                    <label for="liver" class="form-label">الكبد :</label>
                    <select name="liver" id="liver" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="تليف">تليف بالكبد</option>
                        <option value="دهنى"> دهنى</option>
                        <option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="kidneysDiv">
                    <label for="kidneys" class="form-label">الكلى :</label>
                    <select name="kidneys" id="kidneys" class="form-select form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="wombDiv">
                    <label for="womb" class="form-label">الرحم :</label>
                    <select name="womb" id="womb" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-2" id="prostateDiv">
                    <label for="prostate" class="form-label">البروستاتا :</label>
                    <select name="prostate" id="prostate" class="form-select  form-control"  >
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >طبيعي</option>
                        <option value="لا">غير طبيعي</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>
                <div class="mb-3 col-3" id="aortaDiv">
                    <label for="aorta" class="form-label">تضخم بالشريان الاورطي :</label>
                    <select name="aorta" id="aorta" class="form-select w-75 form-control"  onchange="message(); xrays();">
                        <option value=" ">--اختر--</option>
                        <option value="نعم" >نعم</option>
                        <option value="لا">لا</option>
<option value="لم يتم">لم يتم </option>
                    </select>
                </div>



            </div>



            <p id="pa1" style="color:red; font-size: 18px;"></p>
	        <p id="pa2" style="color:red; font-size: 18px;"></p>
            <p id="pa3" style="color:red; font-size: 18px;"></p>
            <p id="pa4" style="color:red; font-size: 18px;"></p>
            <p id="pa5" style="color:red; font-size: 18px;"></p>
	        <p id="pa6" style="color:red; font-size: 18px;"></p>
            <p id="pa7" style="color:red; font-size: 18px;"></p>
            <p id="pa8" style="color:red; font-size: 18px;"></p>
            <p id="pa9" style="color:red; font-size: 18px;"></p>
            <p id="pa10" style="color:red; font-size: 18px;"></p>
             <p id="pa11" style="color:red; font-size: 18px;"></p>
             <p id="pa12" style="color:red; font-size: 18px;"></p>
             <p id="pa13" style="color:red; font-size: 18px;"></p>
            <p id="message" style="color:red; font-size:18px;"></p>
	        <p id="message1" style="color:red; font-size:18px;"></p>
            <p id="message2" style="color:red; font-size:18px;"></p>
            <p id="message3" style="color:red; font-size:18px;"></p>
            
            
    </div>
	   </section>
     <?php }
      }
            
            ?>
       <hr>

       
    <button id="buttonSubmit" class="btn btn-lg text-white submitButton" type="submit" name="submit"  onclick="return confirm('هل جميع البيانات صحيحة؟');">
                 حفظ  </button>
       <button class="btn btn-lg text-white backButton" type="button" name="back">
           <a href="../check.php">رجوع</a></button>
 

    
       
		</form>
        </section>

        
         <footer>
        <p style="font-size:19px;"> &copy; 2021  جميع الحقوق محفوظة لوزارة الصحة و السكان المصرية. </p>
        </footer>
           <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>  
        <script src="../js/wow.min.js"></script> 
        <script>new WOW().init();</script> 
        <script src="../js/mine.js"></script>
          <script>
          
          function p9(){
              var p1 = document.getElementById(p1).value;
              console.log(p1);
              if(p1 == 7){
                    document.getElementById(pa1).innerHTML = "يتم التحويل الي المستشفي لاستكمال الفحوصات و العلاج";
              }
            
          }
          
          function foreignerCheck(){
    console.log("check");
    if(document.getElementById("egyptian").checked){
        console.log("egypt");
        document.getElementById("enational").style.display = "block";
        document.getElementById("fnational").style.display = "none";
        document.getElementById("fcountry").style.display = "none";
       
        
    }
    else{
        console.log("not");
        document.getElementById("enational").style.display = "none";
        document.getElementById("fnational").style.display = "block";
        document.getElementById("fcountry").style.display = "block";
        
    }
}
              function validationID() {
    var str = document.getElementById("nationalId").value;
    var res = str.split('');
    var Array = res;
    var month = Array[3] + Array[4];
    var day = Array[5] + Array[6];
    console.log(res);
    console.log(Array);
     var length = str.length;
        if (length !== 14)
        {
            document.getElementById("idError").innerHTML = "خطأ فى الرقم القومى";
        }

        // Check the left most digit
		if (Array[0] != 2 && Array[0] != 3)
		{
        document.getElementById("idError").innerHTML = "خطأ فى الرقم القومى";
		}
		if(month < 01 && month > 12){
          document.getElementById("idError").innerHTML = "خطأ فى الرقم القومى";
        }
		
     if(day < 01 && day > 31){
          document.getElementById("idError").innerHTML = "خطأ فى الرقم القومى";
        }
		
    var res1 = Array[0] * 2;
    var res2 = Array[1] * 7;
    var res3 = Array[2] * 6;
    var res4 = Array[3] * 5;
    var res5 = Array[4] * 4;
    var res6 = Array[5] * 3;
    var res7 = Array[6] * 2;
    var res8 = Array[7] * 7;
    var res9 = Array[8] * 6;
    var res10 = Array[9] * 5;
    var res11 = Array[10] * 4;
    var res12 = Array[11] * 3;
    var res13 = Array[12] * 2;
    var res14 = Array[13];
    console.log(res1);
    var totalres = (res1 + res2 + res3 + res4 + res5 + res6 + res7 + res8 + res9 + res10 + res11 + res12 + res13);
    console.log(totalres);
    var x = totalres / 11;
    var out = parseInt(x) * 11;
    var ot = totalres - out;
    console.log(ot);
    var y = 11 - ot;
    console.log(y);
    if (res14 == y) {
       document.getElementById("idError").innerHTML = "";
    } else {
      document.getElementById("idError").innerHTML = "خطأ فى الرقم القومى";
        return false;
    }
    if (Array[12] % 2 == 0) {
        document.getElementById("female").checked = true;
        console.log("female");

    } else {
        document.getElementById("male").checked = true;
        console.log("male");
    }
    if (Array[0] == 2) {
        var today = new Date();
        var currentYear = today.getFullYear();
        console.log (currentYear);
        var yearArray = 19 + Array[1] + Array[2];
        var month = Array[3] + Array[4];
        var day = Array[5] + Array[6];
        var birthday = month + '/' + day + '/' + yearArray;
        var age = currentYear - yearArray;
        console.log(age);
        document.getElementById("age").value = age;
        console.log(birthday);
        console.log(yearArray);
    }

    if (Array[0] == 3) {
       var today = new Date();
        var currentYear = today.getFullYear();
        console.log (currentYear);
        var yearArray = 20 + Array[1] + Array[2];
        var month = Array[3] + Array[4];
        var day = Array[5] + Array[6];
        var birthday = month + '/' + day + '/' + yearArray;
        var age = currentYear - yearArray;
        console.log(age);
        document.getElementById("age").value = age;
        console.log(birthday);
        console.log(yearArray);
    }
if(age < 65){
    console.log ("age" + age);
 document.getElementById("hntt").innerHTML = "لا يسمح بالتسجيل لمن هم دون 65 عام";
document.getElementById("buttonSubmit").style.visibility = "hidden";
    
                  }
                  else{
    console.log ("age" + age);
 document.getElementById("hntt").innerHTML = " ";
document.getElementById("buttonSubmit").style.visibility = "visible";
    
                  }
} 
function bmiCalculate(){
   var height = document.getElementById("height").value / 100;
var weight = document.getElementById("weight").value;
var bmi = weight / (height*height);
    var result = bmi.toFixed(2);
   // var bmiText = document.getElementById("bmi").innerHTML;
   if (height > 0 && weight > 0){
       console.log(result);
       document.getElementById("bmiDiv").style.display = "block";
       document.getElementById("bmi").innerHTML = result
        
   }
    else{
        
        document.getElementById("bmiDiv").style.display = "none";
        document.getElementById("heightError").style.display = "block";
        document.getElementById("weightError").style.display = "block";
    
    }
}

          
          function errorCheck(){
         var height = document.getElementById("height").value;
    var diastolic = document.getElementById("diastolic").value;
    var systolic = document.getElementById("systolic").value;
    var weight = document.getElementById("weight").value;
     var diabetesCheck = document.getElementById("diabetesCheck").value;
              
    var creatinine = document.getElementById("creatinine").value;

    var p1 = document.getElementById("p1").value;
     
  if(diastolic < 30 || diastolic > 150 || systolic < 60 || systolic > 260){
   
        document.getElementById("pressureError").innerHTML =  "* من فضلك ادخل قيمة صحيحة";
      console.log(height);
      console.log(weight);
    }
    else{
        document.getElementById("pressureError").innerHTML = " ";
    }
   if(weight < 40 || weight > 250){
        document.getElementById("weightError").innerHTML =  "* من فضلك ادخل قيمة صحيحة";
    }
    else{
        document.getElementById("weightError").innerHTML = " ";
    }
     if(height < 50  || height > 300){
        document.getElementById("heightError").innerHTML =  "* من فضلك ادخل قيمة صحيحة";
    }
    else{
        document.getElementById("heightError").innerHTML = " ";
    }
     if(diabetesCheck < 7 ||  diabetesCheck > 600){
        document.getElementById("diabetesError").innerHTML =  "* من فضلك ادخل قيمة صحيحة";
    }
    else{
        document.getElementById("diabetesError").innerHTML = " ";
    }
       
         
        
        
              if(p1 < 0  || p1 > 18){
                  document.getElementById("hbError").innerHTML =  "* من فضلك ادخل قيمة صحيحة";
              }
              else{
                  document.getElementById("hbError").innerHTML =  " ";
              }
}

           function message(){
    
    var egrf = document.getElementById("egrf").value;
    var diastolic = document.getElementById("diastolic").value;
    var systolic = document.getElementById("systolic").value;
    var diabetesCheck = document.getElementById("diabetesCheck").value;
    var p1 = document.getElementById("p1").value;
    var p2 = document.getElementById("p2").value;
    var p3 = document.getElementById("p3").value;           
    var p4 = document.getElementById("p4").value;
    var p5 = document.getElementById("p5").value;
    var p6 = document.getElementById("p6").value;
     var p7 = document.getElementById("p7").value;
    var p8 = document.getElementById("p8").value;
   var p9 = document.getElementById("p9").value;            
               
    if(egrf > 90){
        document.getElementById("message").innerHTML = "  تحتاج إلى متابعة وظائف الكلى بعد عام  ";
         console.log("more");
    }
    else if (egrf >= 60 && egrf <= 89){
         document.getElementById("message").innerHTML = 
             "   تحتاج إلى متابعة وظائف الكلى بعد 6 شهور للأهمية وعدم تناول أدوية إلا بعد استشارة الطبيب ";
         console.log("between");
    }
     else if (egrf <= 60 ){
         document.getElementById("message").innerHTML = "  يتم التحويل لأقرب عيادة كلى تخصصية ";
    }
               else{
                   document.getElementById("message").innerHTML = "  ";
               }
    
                if(diabetesCheck >= 200){
     document.getElementById("message1").innerHTML = "  تحتاج إلى متابعة مستوى السكر بالدم للأهمية  ";
 }
   else{
     document.getElementById("message1").innerHTML = " ";   
   }
  
     if(systolic >= 140 || diastolic >= 90){
         document.getElementById("message3").innerHTML = "  تحتاج إلى متابعة ضغط الدم للأهمية  ";
     }
               else{
                   document.getElementById("message3").innerHTML = "  ";
               }
               if(p1 < 7 || p1 >= 11 || p5 == 'لا' || p4 == 'بحاجه لتدخل بالمستشفي' || p2 == 'ايجابى' || p3 == 'يحتاج لتدخل' || p6 == 'تحويل' || p7 == '11' || p8 == '2'){
                   document.getElementById("pa1").innerHTML = "يتم التحويل الي المستشفي لاستكمال الفحوصات و العلاج ";
               }
               else if(p1 = 7 || p1 <= 10 || p4 == 'لا'){
                   document.getElementById("pa1").innerHTML = "يتم تحويل المريض الي عيادة الوحدة/المركز لتلقي العلاج و المتابعة";
               }
                else{
                   document.getElementById("pa1").innerHTML = " ";
               }
               
            if(p6 == 'متابعة'){
                 document.getElementById("pa2").innerHTML = "يتم المتابعة بعد شهر في وحدة/مركز طب الاسرة"; 
            }
                else{
                   document.getElementById("pa2").innerHTML = " ";
               }
               
           if(p7 == '5'){
                document.getElementById("pa3").innerHTML = "تثقيف صحي";
           }
               else{
                    document.getElementById("pa3").innerHTML = " ";
               }
          if(p8 == '1'){
               document.getElementById("pa4").innerHTML = "تثقيف تغذوي و المتابعة بعد شهر في وحدة/مركز طب الاسرة";
          }
               else{
                   document.getElementById("pa4").innerHTML = " ";
               }
               
               console.log(p9);
               
                if(p9 == 'لا'){
                console.log("p9: " + p9);
                  document.getElementById("xrays").style.visibility = "visible"; 
             } 
        else {
             console.log("p9: " + p9);
                  document.getElementById("xrays").style.visibility = "hidden";

             }
              
      }
              function checkGender(){
                if(document.getElementById("female").checked){
                        console.log("womb");
                        document.getElementById("wombDiv").style.display = "block";
                        document.getElementById("prostateDiv").style.display = "none";
                    }
                 else if (document.getElementById("male").checked){
                        console.log("prostate");
                      document.getElementById("wombDiv").style.display = "none";
                        document.getElementById("prostateDiv").style.display = "block";
                       
                    }
              }
              
              
           function checkGender1(){
             var gender =  document.getElementById("gender").value;
               console.log(gender);
                if(gender == 'أنثى'){
                        console.log("womb");
                        document.getElementById("wombDiv").style.display = "block";
                        document.getElementById("prostateDiv").style.display = "none";
                    }
                 else if (gender == 'ذكر'){
                        console.log("prostate");
                      document.getElementById("wombDiv").style.display = "none";
                        document.getElementById("prostateDiv").style.display = "block";
                       
                    }
              }   
              
              
              function xrays(){
                   var liver = document.getElementById("liver").value;
                 var kidneys = document.getElementById("kidneys").value;
                 var womb = document.getElementById("womb").value;
                 var prostate = document.getElementById("prostate").value;
                 var aorta = document.getElementById("aorta").value;
                 
                if(kidneys == 'لا' || womb == 'لا' || prostate == 'لا' || aorta == 'نعم'){
                      document.getElementById("pa1").innerHTML = "يتم التحويل الي المستشفي لاستكمال الفحوصات و العلاج ";
                }
                 if(liver == 'تليف'){
                       document.getElementById("pa5").innerHTML = "يتم التحويل الي وحدات العلاج التابعة للجنة القومية لمكافحة الفيروسات الكبدية";
                 }
                 if(liver == 'دهنى'){
                      document.getElementById("pa5").innerHTML = "تثقيف صحي حول التغذية السليمة";
                 }
     
              }
             function toggleForm() {
    var form = document.getElementById("tableDiv");
    var showHide = document.getElementById("showHide");

    if (form.style.display == "none") {

        form.style.display = "block";
        showHide.innerHTML = '<i class="fas fa-chevron-up"></i>';
    }
    else {

        form.style.display = "none";
        showHide.innerHTML = '<i class="fas fa-chevron-down"></i>';

    }
}
              function checkAll(){
                var diabetes = document.getElementById("diabetes").value;
                var bloodpressure = document.getElementById("bloodpressure").value;
                var heartdisease = document.getElementById("heartdisease").value;
                var smoking = document.getElementById("smoking").value;
                  {
                      if(diabetes == ' ' || bloodpressure == ' ' || heartdisease == ' ' || smoking == ' '){
                         document.getElementById("buttonSubmit").style.display = "none";
                          window.alert("من فضلك ادخل جميع الحقول المطلوبة");
                      }
                      else{
                        document.getElementById("buttonSubmit").style.display = "block";  
                      }
                  }
              }
          
          </script>
    </body>
</html>

		<?php
      }
?>