<?php


session_start();

if(!isset($_SESSION['username']) && !isset($_SESSION['usertype']))
{
  header("location: ../index.php");
}
include 'include/header.php';
include_once '../dbconn.php';
$exam_id =$_POST['exam_id'];
$course_id=$_POST['course_id'];
$course_name=$_POST['course_name'];




$sql="SELECT * FROM subjects where course_id=$course_id ";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
  $i=1;
  echo '<bR><br>';
 echo '<center><h4>The course  <strong style="color:red;"> '.$course_name.'</strong> Has The Following Subjects</h4>';

 echo '<center><h4>Select The Subject which You want To Add Question  .</h4>
                
 </center>';
 echo '<table class="table" border="1px solid black">';
echo '<thead>
    <tr>
        <th>SN </th>
       <th>Subject Name</th>
       <th>Action</Action</th>
    </tr>
</thead>';
 echo '<br>';
    while($row=mysqli_fetch_assoc($result))
    { 
      echo '<tr>';
       echo '<td>'.$i.'</td>';
       echo '<td>'.$row['name'].'</td>';
       echo '<td>
       <form action = "question.php " method="POST">
       <input type="hidden" name="subject_id" value='.$row['id'].'>
       <input type="hidden" name="exam_id" value='.$exam_id.'>

       <input type="submit" class="btn btn-primary" name="verify" value="Select"> 
       </form>
       </td>';
       echo '</tr>';
     $i++;


     }
}



?>