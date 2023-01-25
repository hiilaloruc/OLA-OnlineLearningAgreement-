<?php
require_once('includes/config.php');

if(isset($_SESSION['id']))
{
    
if(isset($_POST['courseId']) && isset($_POST['studentId']) && isset($_POST['comment']) && isset($_POST['difficulty']) ){

    $courseId= htmlspecialchars($_POST['courseId']);
    $studentId = htmlspecialchars($_POST['studentId']);
    $comment = htmlspecialchars($_POST['comment']);
    $difficulty = htmlspecialchars($_POST['difficulty']);

                $sql = "INSERT INTO `comment`( `id_student`, `id_course`, `Text`, `Point`) VALUES (?,?,?,?)";
                $dizi = [ 
                    $studentId,
                    $courseId,
                    $comment,
                    $difficulty
                 ];
    
                $sth = $pdo->prepare($sql); 
                $sonuc = $sth->execute($dizi); 
                echo"ok";

                $sql3 = "UPDATE `course` SET `Point`= (SELECT AVG(`Point`) as Average FROM `comment` WHERE `id_course` = ?) WHERE course.ID = ? ";
                $dizi3 = [ 
                    $courseId,
                     $courseId
                 ];
                $sth3 = $pdo->prepare($sql3); 
                $sonuc3 = $sth3->execute($dizi3); 
                echo"ok2";
                
         
}

} else{
    header('Location: index.php');
}


?>