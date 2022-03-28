<?php
      session_start();
      include('include/header.php');
      include_once '../dbconn.php';

     
          $exam_id = $_POST['exam_id'];
          $subjects_id = $_POST['subjects_id'];
      
        $login_id = $_SESSION['id'];
      
///for checking the student entering to the exam
if(isset($_POST['submit']))
      {
          $exam_id = $_POST['exam_id'];
          $subjects_id = $_POST['subjects_id'];
          $login_id = $_SESSION['id'];

          $query = "SELECT * from student_exam where login_id='$login_id' AND exam_id='$exam_id' AND subjects_id = '$subjects_id'";
          $result = mysqli_query($conn, $query);
          $res=mysqli_fetch_assoc($result);

          if(mysqli_num_rows($result)>0)
          {
              echo '<br>';
             echo ' <div class="form-group row">';
             echo '<div class="col-sm-9">';
            echo '<h1 style="color:red">Sorry!!</h1>';
              echo '<h1><strong>You have already submited!!</strong></h1>';
              echo  '<br>';
              echo '<h3>You are not allowed to entered Again in This exam</h3>';
              echo '<form action="../index.php" method="post">';
             echo  '<div class="form-group row">
  <div class="col-sm-3 ml-auto mr-auto">
  <br><br>
    <button type="submit" class="form-control btn btn-primary" name="back">Proceed To Back</button>
  </div>';
            echo '</div>';
            echo '</div>';
            echo '</form>';
            //Header("Location:index.php");
            
          }
          else
          {
            $query = "INSERT INTO student_exam(`login_id`, `exam_id`, `subjects_id`) VALUES ('$login_id','$exam_id','$subjects_id')";
            $result = mysqli_query($conn, $query);
            $insert_id = mysqli_insert_id($conn);
            if($result == true)
            {
                echo ' <div class="form-group row">';
                echo '<div class="col-sm-12">';
            echo '<form action="question.php" method="post">';
            echo '<input type="hidden" name="exam_id" value="'.$exam_id.'">';
            echo '<input type="hidden" name="subjects_id" value="'.$subjects_id.'">';
            echo '<h1>Welcome To Our Exam System</h1>';
            echo '<h3><strong style="color:red;">Please follow the term and conditon!!</strong></h3>';
            echo '<h2>Each question carry Equal marks</h2>';
            echo  '<div class="form-group row">
            <div class="col-sm-3 ml-auto mr-auto">
          
              <button type="submit" class="form-control btn btn-primary" name="submit1">Let\'s Start</button>
            </div>';
            echo '</div>';
            echo '</div>';
            echo '</form>';

          
            if(isset($_POST['submit1']))
            {
             Header("Location:question.php");
            }

            }
            
        }
          
        }


?>
<?php 
       
       ?> 
       <br><br><br><br><br><Br>        <br><br><br><br><br><Br>
       <?php

        echo '<div class="col-sm-12">';
       include 'include/footer.php'; 
       echo '</div>';
       ?>