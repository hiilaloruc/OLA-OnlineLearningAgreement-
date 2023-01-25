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

if (isset($_GET["removeBasket_id"])) {
    $sql   = " DELETE FROM `mycourse` WHERE `mycourse`.`ID`= ?; ";
    $sorgu = $baglan->prepare($sql);
    $sorgu->execute([$_GET["removeBasket_id"]]);
    
    header("Location:my-courses.php");
}


   
     

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>My Courses | OLA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <style>
        .myForm{
            display: none;
        }
    </style>

</head>
<body>
<?php
include 'nav.php';
?>

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body" id="content">

          
            <!-- row -->

            <div class="container-fluid">
          


            <div class="row" >
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">MY COURSES</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Course Name</th>
                                                <th scope="col">ECTS</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {?>
                                           <tr>
                                                <td><a href="course-detail.php?id=<?= $satir['courseId'] ?>"><?= $satir['Name'] ?></a></td>
                                                <td> <b><?= $satir['ECTS'] ?></b> </td>
                                                 <td>
                                                     <span><a href="my-courses.php?removeBasket_id=<?= $satir['mycourseId'] ?>"><button type="button" class="btn mb-1 btn-rounded btn-outline-danger" >REMOVE<span class="btn-icon-right"><i class="fa fa-close"></i></span></button></a></span>
                                                     <span><button type="button"  onclick="openForm('<?= $satir['Name'] ?>',<?= $satir['courseId'] ?>)" class="btn mb-1 btn-rounded btn-outline-warning open-button" >ADD COMMENT<span class="btn-icon-right"><i class="fa fa-paper-plane"></i></span></button></span>
                                                </td>
                                                
                                            </tr>
                                            <?php
}
?>
                                       </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /# card -->
                           <div class="card myForm" id="myForm">
                            <div class="card-body">
                           
                                        <h1 id="titleComment">Add Comment</h1>

                                        <label for="difficulty"><b>Difficulty</b></label><br>
                                            <input type="radio" name="difficulty"  value="1" selected> ★☆☆☆☆</label><br>
                                            <input type="radio" name="difficulty" value="2"> ★★☆☆☆</label><br>
                                            <input type="radio" name="difficulty" value="3"> ★★★☆☆</label><br>
                                            <input type="radio" name="difficulty" value="4"> ★★★★☆</label><br>
                                            <input type="radio" name="difficulty" value="5"> ★★★★★</label><br>
                                        
                                        <textarea class="form-control h-150px" name="comment" rows="6" id="comment"></textarea>
                                        <span><button style="margin-top: 25px;" type="button"  onclick="closeForm()" class="btn mb-1 btn-flat btn-danger" >CLOSE<span class="btn-icon-right"><i class="fa fa-close"></i></span></button></span>
                                        <span><button style="margin-top: 25px;" type="submit" id="submitcomment" name="sendComment" class="btn mb-1 btn-flat btn-primary" >SEND<span class="btn-icon-right"><i class="fa fa-paper-plane"></i></span></button></span>

                                
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
        
        <?php
include 'footer.php';
?>
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
    <script>
function openForm(name,id) {
  document.getElementById("myForm").style.display = "block";
  document.getElementById("titleComment").innerHTML= name;
//   var courseId = id;
  
  var studentID = <?php echo $_SESSION['id']; ?>

 document.getElementById("submitcomment").onclick = function() {  
   
     var comment = document.getElementById("comment").value;
  var difficulty = document.querySelector('input[name="difficulty"]:checked').value;

    $.ajax({
        url: "SubmitComment.php",
        type: "post",
        data: {courseId: id , comment : comment , studentId : studentID ,difficulty : difficulty } ,
        success: function (response) {
           
           console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
};  
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script src="js/jsPDF.js"></script>
</body>

</html>

<?php 

}
else {
    header('Location: index.php');
}

?>