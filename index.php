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
            <div class="col-1"><img src="img/Ministry_of_Health_and_Population_of_Egypt.png" class="img-fluid"
                    style="height:80px;  margin-top:10px;" /></div>
            <div class="col-2">
                <h6 class="text-white d-inline" style=" font-weight: bold;"><br>جمهورية مصر العربية <br>وزارة الصحة و
                    السكان </h6>
            </div>
            <div class="col-5"></div>
            <div class="col-4 pt-1"><img src="img/100million.png" class="img-fluid" style="height:80px;" /></div>
        </div>
    </nav>
    <div class="container mb-5">
        <div class="row">
            <div class="leftD" style=" padding-top:90px;"><img src="img/sisi.png" style="width:430px; height:400px;">
            </div>
            <div class="container centerD mt-5">
                <div class="card-body container WOW fadeIn text-center" style="padding-top:50px; width:400px;">
                    <h2>تسجيل دخول</h2>
                    <form name="login" action="" method="POST">
                        <div class="form-group pt-3"><input name="username" type="text" class="form-control"
                                placeholder="اسم المستخدم" required><br><input name="password" type="password"
                                class="form-control" placeholder="**********" required><br><button
                                class="btn btn-lg text-white submitButton" type="submit" name="login">دخول</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<?php
    require_once 'connection.php';
    if(isset($_POST['login'])){
      $username = $_POST['username'];
        $password = $_POST['password'];
        $ins="SELECT * FROM user WHERE username = '$username' AND password = '$password' limit 1";
        $query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
        $result = mysqli_fetch_array($query);
          $permission = $result['permission'];
        $_SESSION['name'] = $result['name'];
        $_SESSION['governorate'] = $result['governorate'];
        $_SESSION['qism'] = $result['qism'];
        $_SESSION['Login'] = "Loggedin";
        if(mysqli_num_rows($query)==1){
         
          if($permission == 1){
             echo '<script type="text/javascript">';echo'window.location.href="admin/home.php";';echo '</script>';
          }
            
           elseif($permission == 2 || $permission == 3){
                echo '<script type="text/javascript">';echo'window.location.href="check.php";';echo '</script>';
           } 
           } 
        else {
          echo "<script type='text/javascript'>alert('اسم المستخدم او كلمة السر خطأ');</script>";
        
        }

 }?>
    
    
    
    
    
    <footer style="position:fixed;">
        <p>&copy;
            2021 جميع الحقوق محفوظة لوزارة الصحة و السكان المصرية. </p>
    </footer>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <script src="js/mine.js"></script>
</body>

</html>