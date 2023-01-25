
<?php
session_start();
if(!isset($_SESSION['id']))
{
$dsn = 'mysql:dbname=ola;host=localhost';
$user = 'root';
$password = '';

try {
    $pdo = new pdo($dsn, $user, $password);
} catch (PDOException $e) {
    echo "Cannot Connected!" . $e->getMessage();
}


    if(isset($_POST['submit'])){
    if(!empty($_POST['email']) && !empty($_POST['password'])) 
    {
        
      
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        $email = strtolower($email);
        $row = 0;
       
       
        $check = $pdo->prepare('SELECT *  FROM  student  WHERE Email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
       
    }
        

    
        if($row > 0)
        {
          
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
               
               
                if($password == $data['Password'])
                {
                   $_SESSION['id']=$data['ID'];
                  $_SESSION['Erasmus_number'] = $data['Erasmus_number'];
                  $_SESSION['First_name'] = $data['First_name'];
                  $_SESSION['Last_name'] = $data['Last_name'];
                  $_SESSION['Email']= $data['Email'];

                     
                     header('Location: home.php');
                   

                    die();
                }else{ header('Location: index.php?login_err=password');
                    die(); }
            }else{ header('Location: index.php?login_err=email'); die(); }
        }else{ header('Location: index.php?login_err=already'); die(); }


    }
    
?>


<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Connexion - OLA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
   
    <?php 
    if(isset($_GET['login_err']))
    {
        $err = htmlspecialchars($_GET['login_err']);

        switch($err)
        {
            case 'password':
                ?>

                <div class="alert alert-danger alert-dismissible fade show" style="text-align:center; position:absolute; width:100%;" role="alert">
                <strong>Alert !</strong> Wrong Password ! 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>

                <?php
            break;

            case 'email':
            ?>
                <div class="alert alert-danger alert-dismissible fade show" style="text-align:center; position:absolute; width:100%;" role="alert">
                <strong>Alert !</strong> Wrong email format ! 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>
            <?php
            break;
            case 'already':
            ?>
                <div class="alert alert-danger alert-dismissible fade show" style="text-align:center; position:absolute; width:100%;" role="alert">
                <strong>Info!</strong> Account doesn't exist ! 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>
            <?php
            break;
        }
    }
    if(isset($_GET['reg_err']))
    {
        $err = htmlspecialchars($_GET['reg_err']);

        switch($err)
        {
            case 'success':
                ?>
                <div class="alert success">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>Success!</strong> You registered successfully.
                </div>
                <?php
            break;
        }
    }
?>



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href=""> <h4>LOGIN</h4></a>
        
                                <form class="mt-5 mb-5 login-input" method="post" action="index.php">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                    </div>
                                    <button class="btn login-form__btn submit w-100" type="submit" name="submit" >Connect</button>
                                </form>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="registration.php" class="text-primary">Register</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>

<?php

}else{
    header('Location: home.php');
}

?>