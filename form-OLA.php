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
$ID    = $_SESSION['id'];
$sql   = "SELECT course.ID as courseId, mycourse.ID as mycourseId, course.ECTS, course.Name FROM `mycourse` INNER join course ON course.ID = mycourse.courseID  where mycourse.studentID =? ;";
$sorgu = $baglan->prepare($sql);
$sorgu->execute([$ID]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>OLA Form - OLA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="./plugins/jquery-steps/css/jquery.steps.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

</head>
<style> 
.wizard .content {
    min-height: 24.75rem;
}
.printBtn{
    background-color: #7570f9;
    border: none;
    color: white;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 600;
    padding: 0.75em 2em;
}
</style>
<body>
<?php include 'nav.php' ?>

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

        <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="#" id="step-form-horizontal" class="step-form-horizontal">
                            <div>
                                <h4>Personnal information</h4>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="erasmusnumber" class="form-control" placeholder="Erasmus Number" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="country" class="form-control" placeholder="Country" required>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h4>Sending institution</h4>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="sendinguniv" class="form-control" placeholder="Sending University Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="sendingfacname" class="form-control" placeholder="Faculty Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="sendingdep" class="form-control" placeholder="Department Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="sendinrespname" class="form-control" placeholder="Responsible Person Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="sendingrespnum" class="form-control" placeholder="Responsible Person Phone Number" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="email" name="sendingemail" class="form-control" placeholder="Responsible Person Email" required>
                                            </div>
                                        </div>
                               
                                    </div>
                                </section>
                                <h4>Receiving institution</h4>
                                <section>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="recunivname" class="form-control" placeholder="Receiving University Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="recfac" class="form-control" placeholder="Faculty Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="recdep" class="form-control" placeholder="Department Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="recrespname" class="form-control" placeholder="Responsible Person Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="recrespnum" class="form-control" placeholder="Responsible Person Phone Number" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="email" name="recresemail" class="form-control" placeholder="Responsible Person Email" required>
                                            </div>
                                        </div>
                                       
                                       
                                    </div>
                                </section>
                            
                                <h4>Courses</h4>
                                <section>
                                <div class="col-lg-10">
                      <a href="javascript:demoFromHTML()" class="printBtn">    <i class="fa-solid fa-print">&nbsp; &nbsp;<span> PRINT OLA</span></i>
</a>
                            <div class="card-body">
                               
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                
                                                <th>NAME</th>
                                                <th>ECTS</th>
                                              
                                            </tr>
                                           
                                        </thead>
                                        <tbody>
                                            <script>
                                                var courses =[];
                                            
                                                </script>
                                         <?php while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {?>
                                           <tr>
                                               <script>  courses.push("<?= $satir['Name'] ?>" + ' (' +  "<?= $satir['ECTS'] ?>" + " ECTS)") </script>
                                                <td><a href="course-detail.php?id=<?= $satir['courseId'] ?>"><?= $satir['Name'] ?></a></td>
                                                <td> <b><?= $satir['ECTS'] ?></b> </td>
                                                 </tr>
                                            <?php
}
?>
                                        </tbody>
                                    </table>
                                    
                            </div>
                        </div>
                    </div>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            

<script>
    console.log(courses);
    </script>



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


    <script src="./plugins/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="./plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="./js/plugins-init/jquery-steps-init.js"></script>
    <script src="js/jsPDF.js"></script>
    <script>
        $("a[href$='#finish']").unbind();
        $("a[href$='#finish']").parent().css("display","none")
         $("a[href$='#finish']").attr("href", "javascript:demoFromHTML()")
         $("a[href$='#finish']").text("Print")
        </script>
</body>

</html>

<?php

} else {
    header('Location: index.php');
}
?>