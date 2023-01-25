<?php
session_start();
if(isset($_SESSION['id']))
{
$dsn = 'mysql:dbname=ola;host=localhost';
    $user = 'root';
    $password = '';

    try {
        $baglan = new pdo($dsn, $user, $password);
    } catch (PDOException $e) {
        echo "Cannot Connected!" . $e->getMessage();
    }
$ID    = $_SESSION['id'];
$sql = "SELECT  `ID`,`Name`, `ECTS`, `Point` FROM `course`";
$sorgu = $baglan->prepare($sql);
$sorgu->execute();


if (isset($_GET["addBasket_id"])) { 
    $sql = "INSERT INTO `mycourse`(`courseID`, `studentID`) VALUES (?,?);";
    $sorgu = $baglan->prepare($sql);
    $sorgu->execute([
        $_GET["addBasket_id"],$ID 
    ]);

    header("Location:course.php");
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>All Courses | OLA</title>
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
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">ALL COURSES</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Course Name</th>
                                                <th scope="col">ECTS</th>
                                                <th scope="col">Difficulty</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $ID = $_SESSION['id'];
                                            $sql2 = "SELECT  mycourse.courseID FROM `mycourse` where mycourse.studentID = ? ;";
                                            $sorgu2 = $baglan->prepare($sql2);
                                            $sorgu2->execute([$ID]);
                                            $my_courseIDs=array();
                                            while ($satir2 = $sorgu2->fetch(PDO::FETCH_ASSOC)) { 
                                            array_push($my_courseIDs,$satir2['courseID']);
                                             }

                                            while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <tr>
                                                <td><a href="course-detail.php?id=<?= $satir['ID'] ?>"><?= $satir['Name'] ?></a></td>
                                                <td> <b><?= $satir['ECTS'] ?></b> </td>
                                                <td><span class="label gradient-9 btn-rounded"><?= $satir['Point'] ?></span>
                                                </td>
                                                <?php 
                                                if (in_array($satir['ID'], $my_courseIDs)){
                                            ?>
                                            <td><span><a href="course.php?addBasket_id=<?= $satir['ID'] ?>"><button type="button" class="btn mb-1 btn-rounded btn-success" disabled="disabled">ENROLLED</button></a></span>
                                                                                            </td>
                                            <?php
                                              }else{  ?>
                                              <td><span><a href="course.php?addBasket_id=<?= $satir['ID'] ?>"><button type="button" class="btn mb-1 btn-rounded btn-outline-success" >ENROLL <span class="btn-icon-right"><i class="fa fa-shopping-cart"></i></span></button></a></span>
                                                </td>
                                              
                                              
                                              <?php } ?>

                                                
                                                
                                               
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
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