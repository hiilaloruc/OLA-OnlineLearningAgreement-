<?php

require_once('includes/config.php');
if(isset($_SESSION['id']))
{
  $message="";
    if(isset($_POST['submit'])){
        if(!empty($_POST['cnmdp']) && !empty($_POST['nmdp'])  && !empty($_POST['mdpa']) && !empty($_POST['email']))
        {  
   
            $mdpa = htmlspecialchars($_POST['mdpa']);
            $nmdp = htmlspecialchars($_POST['nmdp']);
            $cnmdp = htmlspecialchars($_POST['cnmdp']);
            $email = htmlspecialchars($_POST['email']);
            $email = strtolower($email); 
            if($cnmdp==$nmdp){
     

            $check = $pdo->prepare('SELECT *  FROM  student  WHERE Email = ?');
            $check->execute(array($email));
            $data = $check->fetch();
            $row = $check->rowCount();
          
            if($row > 0){ 
             
                if($mdpa==$data['Password'])
                {
                    
                                $sql = $pdo->prepare('UPDATE student SET Password=:password WHERE Email=:email ');
                             
                                $sql->execute(array(
                                    'password' => $nmdp,
                                    'email' => $email
                                ));
                             
                               
                                $message = "ok";
                               
                }else{$message="Incorrect password";}        
                      
                
               
            }else{ $message ="This account doesn't exist !";}
         
    
        }else{$message = "The new password and confirmation password doesn't match !";}
    
    
        }else{$message= "All field should be completed !"; }
    
    
     





    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Profile | OLA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
   
</head>
<body>
<?php include 'nav.php' ?>

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

           
            <!-- row -->

           <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-4">
                                    <img class="mr-3" src="images/user/form-user.png" width="80" height="80" alt="">
                                    <div class="media-body">
                                        <h3 class="mb-0"><?php echo $_SESSION['First_name'] . " " . $_SESSION['Last_name'];?></h3>
                                        <p class="text-muted mb-0"><?php echo $_SESSION['Erasmus_number']; ?></p>
                                    </div>
                                </div>
                                
                                
                                <h4>About Me</h4>
                                <ul class="card-profile__info">
                                    <li><strong class="text-dark mr-4">Email</strong> <span><?php echo $_SESSION['Email']; ?></span></li>
                                    <li><strong class="text-dark mr-4">Erasmus Number</strong> <span><?php echo $_SESSION['Erasmus_number']; ?></span></li>
                                </ul>
                            </div>
                            
                        </div>  


                     


                        <div class="card insert-alert">
                       
               <?php  if ($message=="ok"){?>
                <div class="alert alert-success alert-dismissible fade show" style="text-align:center; position:absolute; width:100%; position:relative;" role="alert">
                <strong>Your password was changed successfully !</strong>  
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>
                <?php }else if($message!="" ){ ?>

                    
                <div class="alert alert-danger alert-dismissible fade show" style="text-align:center; position:absolute; width:100%; position:relative;" role="alert">
                <strong>Alert !</strong> <?php echo $message; ?> 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>
<?php } ?>



                            <div class="card-body">
                                <h4 class="card-title">Change password</h4>
                                <hr>
                                <div class="basic-form">
                                    <form id="ModifierMdp" method="post" action="">
                                    <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Old password :</label>
                                            <div class="col-sm-6">
                                            <input type="hidden" name="email" value="<?php echo $_SESSION['Email']; ?>" >
                                                <input type="password" name="mdpa" id="mdpa" placeholder="Enter old password" class="form-control-plaintext" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">New password:</label>
                                            <div class="col-sm-6">
                                            <input type="password" name="nmdp" id="nmdp" placeholder="Enter new password" class="form-control-plaintext" value="" required>                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Confirm new password :</label>
                                            <div class="col-sm-6">
                                            <input type="password" name="cnmdp" id="cnmdp" placeholder="Confirm new password" class="form-control-plaintext" value="" required>                                             </div>
                                        </div>
                                      
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label"></label>
                                            <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary" name="submit">Change</button>
                                            </div>
                                        </div>
                                      
                                    </form>
                                </div>
                            </div>
                        </div>
                    



                    </div>
                    

                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <?php include 'footer.php' ?>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

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
    header('Location: index.php');
}

?>