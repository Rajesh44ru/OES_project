<?php
 session_start();     
include('include/header.php');


$lopp= $_POST['imp'];
include_once '../dbconn.php';
$exam_id=$_POST['exam_id'];
$subjects_id=$_POST['subject_id'];
$login_id=$_SESSION['id'];


$q1="SELECT * from `question_list` where `exam_id`='$exam_id' and `subjects_id`='$subjects_id'";
$result=mysqli_query($conn,$q1);
$corr=array();
$aako=array();
$i=0;
$score=0;
if(mysqli_num_rows($result)>0)
{


    while($row=mysqli_fetch_assoc($result))
    {
       $corr[$i]=$row['correct_opt'];

    $i++;
    }
    for($k=0;$k<$i;$k++)
{

    if($_POST[$k]==$corr[$k])
    $score=$score+1;
    // echo "This is value ";
    // echo $_POST[$k];
    // echo '<Br>';

    // echo "This is correct value";
    // echo $corr[$k];
    // echo '<Br>';
    

}
// echo "***************************************";
 //echo "The score is :".$score;
// echo "the login id :".$login_id;
 ///for inserting the values;
 $sql2="SELECT username FROM LOGIN where id=$login_id";
 $result2=mysqli_query($conn,$sql2);
 $row1=mysqli_fetch_assoc($result2);
 $user_name=$row1['username'];
 //for exam name
 $sql3="SELECT * FROM exam where id=$exam_id";
 $result3=mysqli_query($conn,$sql3);
 $row2=mysqli_fetch_assoc($result3);
 $exam_name=$row2['name'];
 $courseid=$row2['course_id'];
///selectin course name
$sql4="SELECT `name` FROM course where id=$courseid";
$result4=mysqli_query($conn,$sql4);
$row3=mysqli_fetch_assoc($result4);
$course_name=$row3['name'];
//selecting subject 
$sql5="SELECT   `name` FROM subjects where id=$subjects_id";
$result5=mysqli_query($conn,$sql5);
$row4=mysqli_fetch_assoc($result5);
$subject_name=$row4['name'];
//echo $subject_name;




$sql6="INSERT INTO result(`exam_name`,`course_name`,`subject_name`,`student_name`,`score`)VALUES('$exam_name','$course_name','$subject_name','$user_name','$score')";

if(mysqli_query($conn,$sql6))
{

      echo ' <center><h3 style="color:blue;">You Have Attend the exam Sucessfully!1 </h3>';
      echo '<form action="../index.php" method="post">';

      echo  '<div class="form-group row">
      <div class="col-sm-3 ml-auto mr-auto">
    
        <button type="submit" class="form-control btn btn-primary" name="submit1">Go to Home page</button>
      </div></div>';
      echo '</form> </center>';
      
      
      
      
   
}
} 

?>