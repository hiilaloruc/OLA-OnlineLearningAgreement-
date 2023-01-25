
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
    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['firstname'])&& !empty($_POST['lastname'])&& !empty($_POST['number'])) 
    {
    
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $number = $_POST['number'];

        $check = $pdo->prepare('SELECT *  FROM  student  WHERE Email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row > 0)
        {
        header('Location: registration.php?reg_err=email'); die(); 
        }
        else{ 
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
            $sql = "INSERT INTO student (`Erasmus_number`, `First_name`, `Last_name`, `Email`, `Password`) VALUES (?,?,?,?,?);";
            $dizi = [ 
                $number,
                $fname,
                $lname,
                $email,
                $password
             ];

            $sth = $pdo->prepare($sql); 
            $sonuc = $sth->execute($dizi);
            echo "register oldu";
            header('Location: index.php?reg_err=success'); die(); 
            }else{
            header('Location: registration.php?reg_err=email'); die(); 
            }


        }
    


        
    }
    }
   if(isset($_GET['reg_err']))
    {
        $err = htmlspecialchars($_GET['reg_err']);

        switch($err)
        {
            case 'email':
            ?>
                <div class="alert alert-danger alert-dismissible fade show" style="text-align:center; position:absolute; width:100%;" role="alert">
                <strong>Alert !</strong> Email exists! 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>
            <?php
            break;
        }
    }
    
?>


<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>REGISTER | OLA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
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

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href=""> <h4>REGISTER </h4></a>
        
                                <form class="mt-5 mb-5 login-input" method="post" action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="number" id="number" placeholder="Erasmus Number" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                    </div>
                                    <button class="btn login-form__btn submit w-100" type="submit" name="submit" >REGISTER</button>
                                </form>
                                <p class="mt-5 login-form__footer">Already have account? <a href="index.php" class="text-primary">Login</a> now</p>
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