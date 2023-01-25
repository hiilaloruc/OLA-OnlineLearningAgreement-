<?php
session_start();

if(isset($_SESSION['id']))
{
$dsn      = 'mysql:dbname=ola;host=localhost';
$user     = 'root';
$password = '';

try {
    $baglan = new pdo($dsn, $user, $password);
}
catch (PDOException $e) {
    echo "Cannot Connected!" . $e->getMessage();
}

$sql = " SELECT  `Name`, `Description`, `ECTS`, `Teacher`, `Point` FROM `course` WHERE `ID`= ?";
$sorgu = $baglan->prepare($sql);
$sorgu->execute([
    $_GET["id"] 
]);

$satir = $sorgu->fetch(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
   <style>
    p.text-muted,.text-dark.mr-4, .mb-1 span,h5.mt-3 {
    font-size: 18px;
}
   </style>
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
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-4">
                                    <img style="border-radius: 50%;" class="mr-3" src="images/media-1.png" width="120"  alt="">
                                    <div class="media-body">
                                        <h2 class="mb-0"><?=$satir["Name"]?></h2>
                                        <p class="text-muted mb-0"> <b>Teacher:</b>  <?=$satir["Teacher"]?></p>
                                    </div>
                                </div>
                                
                                <div class="row mb-5">
                                    <div class="col">
                                        <div class="card card-profile text-center">
                                            <span class="mb-1 text-primary"><i class="icon-notebook"></i></span>
                                            <h3 class="mb-0"><?=$satir["ECTS"]?></h3>
                                            <p class="text-muted px-4">ECTS</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card card-profile text-center">
                                            <span class="mb-1 text-warning"><i class="icon-speedometer"></i></span>
                                            <h3 class="mb-0"> <?=$satir["Point"]?></h3>
                                            <p class="text-muted">Difficulty</p>
                                        </div>
                                    </div>
                                </div>

                                <h3>About The Course (<?=$satir["Name"]?>)</h3>
                                <p class="text-muted"><?=$satir["Description"]?></p>
                                <ul class="card-profile__info">
                                    <li class="mb-1"><strong class="text-dark mr-4">ECTS</strong> <span><?=$satir["ECTS"]?> ECTS</span></li>
                                    <li class="mb-1"><strong class="text-dark mr-4">TEACHER</strong> <span><?=$satir["Teacher"]?></span></li>

                            
                                     <h5 class="mt-3">DIFFICULTY <span class="float-right"><?=$satir["Point"]?>/5</span></h5>
                                     <div class="progress" style="height: 9px">
                                    <div class="progress-bar bg-danger wow  progress-" style="width: <?=$satir["Point"]*20?>%;" role="progressbar"><span class="sr-only"></span>
                                    </div>
                                </div>
                                </ul>
                            </div>

                             
                            
                        </div>
                        <!-- /# card -->
                        <div class="card">
                            <div class="card-body">
                                <?php 
                                
                                $sql2 = " SELECT  student.First_name as fname, student.Last_name as lname ,`Text`, `Point` from comment INNER JOIN student on student.ID = `id_student` where `id_course` =?";
                                $sorgu2 = $baglan->prepare($sql2);
                                $sorgu2->execute([
                                    $_GET["id"] //get ile gelen id bir statement nesnesi döndürecek
                                ]);
                                  while ($satir2 = $sorgu2->fetch(PDO::FETCH_ASSOC)){
                                      $pertange = $satir2["Point"]*20;
                                      ?> 
                                      
                                      <div class="media media-reply">
                                <img class="mr-3 circle-rounded" src="images/user/form-user.png" width="50" height="50" alt="Generic placeholder image">
                                <div class="media-body">
                                    
                                    <div class="d-sm-flex justify-content-between mb-2">
                                        <h5 class="mb-sm-0"><?= $satir2['fname'] ?> <?= $satir2['lname'] ?> <small class="text-muted ml-3"></small></h5>
                                        <div class="media-reply__link">
                                        </div>
                                    </div>
                                    <p> <?= $satir2['Text'] ?></p>
                                    <div class="progress" style="height:9px">
                                    <div class="progress-bar bg-warning wow  progress-" style="width: <?=$pertange?>%;height:9px;" role="progressbar"> <?=$satir["Point"]?>/5 <span class="sr-only"></span>
                                    </div></div>
                                </div>
                            </div>
                                      
                                      
                                      
                                      <?php
                                  }

                                
                                
                                ?>
                             
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                  
                    
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