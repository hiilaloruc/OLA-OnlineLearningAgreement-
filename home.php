
<?php
 session_start();


 if(isset($_SESSION['id']))
{

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>HOME | OLA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

</head>
<body>
<?php include 'nav.php' ?>

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body" id="content">

           
            <!-- row -->

            <div class="container-fluid">
          


            <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card linear-coloring">
                            <div class="card-body">
                              <div class="intro-text">
                                <div class="intro-heading">
                                <h1><span>Online</span> Learning Agreement</h1>
                                </div>
                                <div class="bottom-box">
                                    <div class="intro-lead-in">
                                    Prepare your Learning Agreement<strong> online within a few steps</strong><br>
                                    and share it with both home and host universities.
                                    </div>
                                    <a href="form-OLA.php">
                                        <button type="button" class="btn mb-1 btn-danger">CREATE OLA <span class="btn-icon-right"><i class="fa fa-star"></i></span>
                                        </button>
                                    </a>
                                    
                                    <a href="course.php">
                                        <button type="button" class="btn mb-1 btn-info">ALL COURSES <span class="btn-icon-right"><i class="fa fa-check"></i></span> 
                                        </button>

                                    </a>
                                    
                                    <a href="my-courses.php">
                                        <button type="button" class="btn mb-1 btn-primary">MY ENROLLMENTS <span class="btn-icon-right"><i class="fa fa-shopping-cart"></i></span>
                                        </button>
                                    </a>
                                     <a href="profile.php">
                                        <button type="button" class="btn mb-1 btn-info">PROFILE<span class="btn-icon-right"><i class="fa fa-heart"></i></span> 
                                        </button>

                                    </a>

                                    <div class="intro-end">
                                    This platform has been developed by the Poznan University of Technology students for the 21st century mobile students.
                                    </div>

                                    
                                </div>
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
    <script src="js/jsPDF.js"></script>
</body>

</html>

<?php 


} else {

    header('Location: index.php');

}

?>