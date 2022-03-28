<?php
session_start();

if(!isset($_SESSION['username']) && !isset($_SESSION['usertype']))
{
  header("location: ../index.php");
}
include 'include/header.php';
include_once '../dbconn.php';
      

    
       if(isset($_POST['submit']))
      {  
        $exam_id=$_POST['exam_id'];
      $subject_id=$_POST['subject_id']; 
      //echo $exam_id;
      //echo $subject_id;
        
          $question = $_POST['question'];
          //var_dump($question);
          $opt_a = $_POST['opt_a'];
          $opt_b = $_POST['opt_b'];
          $opt_c = $_POST['opt_c'];
          $opt_d = $_POST['opt_d'];
          $correct_option = $_POST['correct_option'];

          $query = "INSERT INTO question_list(exam_id, subjects_id,ques,opt_a,opt_b,opt_c,opt_d,correct_opt) VALUES ('$exam_id','$subject_id','$question','$opt_a','$opt_b','$opt_c','$opt_d','$correct_option')";
          $result = mysqli_query($conn, $query);
          if($result == true)
          {
            echo '<Center><br><br> <Br> <Br> <Br>
            <h4><strong style="color:red;">Question inserted sucessfully!!<h4> <center>';
            echo '<br><br> <Br> <Br> <Br>';
            echo '<form action="../admin/question.php" method="post">';
                        echo  '<div class="form-group row">
             <div class="col-sm-3 ml-auto mr-auto">
               <input type="hidden" name="exam_id" value="'.$exam_id.'">
               <input type="hidden" name="subject_id" value="'.$subject_id.'">

               <button type="submit" class="form-control btn btn-primary" name="back">click For Next</button>
             </div>'
             ;
             echo '<b><br>';
             echo '<form>';
          }
          else
          {
              echo 'insert failed';
          }
        }
?>

