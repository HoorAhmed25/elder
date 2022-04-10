<?php  session_start(); ?><html dir="rtl">

<head>
    <title>وزارة الصحة و السكان</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Ministry_of_Health_and_Population_of_Egypt.png" type="image/x-icon">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo&display=swap');
        body{
            font-family: 'Cairo', sans-serif; !important
        }
    
    </style>
</head>

<body style="background-color:#eeeeee; overflow-x: hidden; overflow-y:scroll;">
 <nav> 
        <div class="row">
        <div class="col-1"><img src="img/Ministry_of_Health_and_Population_of_Egypt.png" class="img-fluid" style="height:75px;  margin-top: 0px;"/></div>
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
    <a class="dropdown-item text-center" href="index.php">تسجيل خروج</a>
  </div>
</div> 
            <div class="col-1"></div>
            <div class="col-4 pt-1"><img src="img/100million.png" class="img-fluid" style="height:80px;"></div>
</div>
		</nav>
           <form name="search-form" action="" method="post">
        <div class="search text-right" style="margin-right:40%; padding-top:50px;">
            <h4 id="error" style="color:red; display:none;"> * لا يسمح بالتسجيل لمن هم دون ال 18 عام  </h4>
        <div class="form-check col-6">
                <label class="form-check-label pt-2 pl-2">الجنسية* : </label>
               <input onchange="foreignerCheck1()" type="radio" name="nationality" id="egyptian" value="مصرى" checked >
                <label class="ml-3"  for="egyptian"> مصرى </label>
                            
              <input onclick="foreignerCheck1()" type="radio" name="nationality" id="foreigner" value="غير مصرى">
             <label for="foreigner">غير مصرى </label>
            </div>
            <div id="enational" class="mb-3 col-6">
    <label for="nationalId" class="form-label">الرقم القومى* :</label>
       <input type="text" class="form-control w-75" name="nationalId" id="nationalId" onkeypress="return isNumberKey(event)"  maxlength="14" autocomplete="off"  onchange="validationID(); checkage();">
                   <p id="idError" style="color:red;"></p>
  </div> 
                         
          <div id="fnational" class="mb-3 col-6" style="display:none;">
    <label for="FnationalId" class="form-label">رقم جواز السفر* :</label>
    <input type="text" class="form-control w-75" name="FnationalId" id="FnationalId" onkeypress="return isNumberKey(event)" maxlength="15" autocomplete="off">
  </div>
           <div id="enational" class="mb-3 col-6">
    <label for="nationalId" class="form-label">السن :</label>
 <input type="number" class="form-control w-75" name="age" id="age" onchange="checkage();" readonly>
  </div>  
            <button class="btn btn-lg text-white submitButton" id="submitButton" type="submit" name="search" disabled>استمرار</button>
         <button class="btn btn-lg text-white backButton" type="button" name="back" style="margin-left:500px;">
           <a href="index.php">خروج</a></button>
        </div>
        </form>
<?php
    require_once 'connection.php';
    if(isset($_POST['search'])){
        $nationalId = $_POST['nationalId'];
        $age = $_POST['age'];
        $_SESSION['nationalId'] = $_POST['nationalId'];
        $_SESSION['FnationalId'] = $_POST['FnationalId'];
        $_SESSION['nationality'] = $_POST['nationality'];
        $_SESSION['age'] = $_POST['age'];
        $name = $_SESSION['name'];
        $ins="SELECT * FROM user WHERE name = '$name' limit 1";
        $query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
        $result = mysqli_fetch_array($query);
        $kidneys = $result['kidneys'];
        $diabetes = $result['diabetes'];
        $elder = $result['elder'];
        if($age < 65){
            if($kidneys == 1 && $diabetes == 1)
            {
            echo '<script type="text/javascript">';echo'window.location.href="suser/form1.php";';echo '</script>';
              
            }
            else if($kidneys == 1 && $diabetes == 0){
          echo '<script type="text/javascript">';echo'window.location.href="normalUser/form.php";';echo '</script>';
               
                }
    }
        
    
        else if($age >= 65){
        if($kidneys == 1 && $diabetes == 1 && $elder == 1)
            {
            echo '<script type="text/javascript">';echo'window.location.href="suserElder/form.php";';echo '</script>';
              
            }
            else if($kidneys == 1 && $diabetes == 0 && $elder == 1)
            {
            echo '<script type="text/javascript">';echo'window.location.href="elder/form.php";';echo '</script>';
              
            }
        
           
                elseif($kidneys == 1 && $diabetes == 1 && $elder == 0)
            {
            echo '<script type="text/javascript">';echo'window.location.href="suser/form1.php";';echo '</script>';
              
            }
            else if($kidneys == 1 && $diabetes == 0 && $elder == 0){
          echo '<script type="text/javascript">';echo'window.location.href="normalUser/form.php";';echo '</script>';
               
                } 
            }
             
           
           } 
        

 ?>
    

    
    
    
    
    <footer style="position:fixed;">
        <p>&copy;
            2021 جميع الحقوق محفوظة لوزارة الصحة و السكان المصرية. </p>
    </footer>
    <script>
         function foreignerCheck1(){
    
    if(document.getElementById("egyptian").checked){
        console.log("egypt");
       document.getElementById("enational").style.display = "block";
        document.getElementById("fnational").style.display = "none";
            document.getElementById("age").readOnly = true;
    }
    else{
        console.log("not");
    document.getElementById("enational").style.display = "none";
       document.getElementById("fnational").style.display = "block";
        document.getElementById("age").readOnly = false;

        
    }
}
        
        function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
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
            document.getElementById("submitButton").style.visibility = "hidden";
        }
                  

        // Check the left most digit
		if (Array[0] != 2 && Array[0] != 3)
		{
        document.getElementById("idError").innerHTML = "خطأ فى الرقم القومى";
            document.getElementById("submitButton").style.visibility = "hidden";
		}
		if(month < 01 && month > 12){
          document.getElementById("idError").innerHTML = "خطأ فى الرقم القومى";
            document.getElementById("submitButton").style.visibility = "hidden";
        }
		
     if(day < 01 && day > 31){
          document.getElementById("idError").innerHTML = "خطأ فى الرقم القومى";
         document.getElementById("submitButton").style.visibility = "hidden";
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
        document.getElementById("submitButton").style.visibility = "visible";
        
    } else {
      document.getElementById("idError").innerHTML = "خطأ فى الرقم القومى";
        document.getElementById("submitButton").style.visibility = "hidden";
        return false;
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
        console.log(age)
        console.log(birthday);
        console.log(yearArray);
         document.getElementById("age").value = age;
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
         document.getElementById("age").value = age;
        console.log(age);
        console.log(birthday);
        console.log(yearArray);
    }


              }
        function checkage(){
            var age = document.getElementById("age").value;
            if(age >= 18){
                document.getElementById("error").style.display = "none";
                document.getElementById("submitButton").disabled = false;
            }
            else{
  document.getElementById("error").style.display = "block";
                document.getElementById("submitButton").disabled = true;
            }
        }
 </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
   
</body>

</html>