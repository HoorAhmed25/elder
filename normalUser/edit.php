<?php session_start(); include '../connection.php'; ?><html dir="rtl">
   <head>
      <title>وزارة الصحة و السكان - مبادرة فحص و علاج الامراض المزمنة</title>
       <meta charset="UTF-8">
        <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
      <link rel="stylesheet" href="../css/all.min.css">
      <link rel="stylesheet" href="../css/animate.css">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/font-awesome.min.css">
       <link rel="stylesheet" href="../css/style.css">
       <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>
    
      <body >
         <nav> 
        <div class="row">
        <div class="col-1"><img src="../img/Ministry_of_Health_and_Population_of_Egypt.png" class="img-fluid" style="height:75px;  margin-top:10px;"/></div>
            <div class="col-4">
             
            <h6 class="text-white" style=" font-weight: bold;">
                  <br>جمهورية مصر العربية
                 <br>وزارة الصحة و السكان
              
                </h6>
            
            </div>
            <div class="col-5"></div>
      <div class="dropdown show d-inline">
  <a class="h3 dropdown-toggle float-left ml-4 mt-4 text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php echo $_SESSION['name']; ?> 
  </a>

  <div class="dropdown-menu float-left" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item text-center" href="form.php">تسجيل </a>
    <a class="dropdown-item text-center" href="../index.php" onclick="<?php session_destroy();?>">تسجيل خروج</a>
    
  </div>
</div>
            </div>
		</nav>
          
          	<div class="card-body container WOW fadeIn text-center" style="padding-top:50px; width:400px; height:500px;">
                <h4 class="text-center">تغيير كلمة المرور</h4>
                <div><?php if(isset($message)) { echo $message; } ?></div>
				<form name="login" action="" method="POST" class="text-right">
					<div class="form-group pt-3">
                        <label class="text-right" for="currentPassword">  كلمة المرور الحالية</label>
						<input name="currentPassword" type="password" class="form-control" placeholder="**********" required><br>
                        <label class="text-right" for="newPassword">  كلمة المرور الجديدة</label>
						<input name="newPassword" type="password" class="form-control" placeholder="**********" required><br>
                        <label class="text-right" for="confirmPassword"> تأكيد كلمة المرور </label>
						<input name="confirmPassword" type="password" class="form-control" placeholder="**********" required><br>
                        <button class="btn btn-lg text-white loginButton" type="submit" name="change" >تغيير</button>
                        
					</div>
				</form>
			</div>
          
          
          
        
     <?php
if(isset($_POST['change'])){ 
           $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $name = $_SESSION['name'];
    $query = "select password from user where name = '$name'";
    $queryget = mysqli_query ($conn,$query) or die("query error");
    $row = mysqli_fetch_assoc($queryget);
    $oldPasswordDB = $row['password'];
    if($oldPasswordDB === $currentPassword){
        if($newPassword === $confirmPassword ){
            $sql= "update user set password = '$newPassword' where name = '$name'";
            $querychange = mysqli_query ($conn,$sql) or die("query update error");
            session_destroy();
            echo '<script type="text/javascript">';echo'window.location.href="../index.php";';echo '</script>';
        }
        else{
        echo '<script type="text/javascript">';
     echo ' alert("passwords doesnt match");';
    echo '</script>';
        }
    }
    else{
         echo '<script type="text/javascript">';
     echo ' alert("password not exist");';
    echo '</script>';
    }
              
              
              
              
              
              

} 
 
          


?>
          
          
          
          
          
          
       
        
        
        
        <script src="../js/jquery-3.3.1.min.js"></script> 
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>  
        <script src="../js/wow.min.js"></script> 
        <script>new WOW().init();</script> 
        <script src="../js/mine.js"></script>
    </body>
</html>
	