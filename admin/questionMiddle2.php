<?php
session_start();

if(!isset($_SESSION['username']) && !isset($_SESSION['usertype']))
{
  header("location: ../index.php");
}
include 'include/header.php';
include_once '../dbconn.php';
///real code here
$course_id=$_POST['id'];
$course_name=$_POST['name'];



$sql="SELECT * FROM exam where course_id=$course_id ";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
  $i=1;
  echo '<bR><br>';
 echo '<center><h4>The course  <strong style="color:red;"> '.$course_name.'</strong> Has The Following Exam.</h4>';

 echo '<center><h4>Select The Exam which You want To Add Question  .</h4>
                
 </center>';
 echo '<table class="table" border="1px solid black">';
echo '<thead>
    <tr>
        <th>SN </th>
       <th>Exam Name</th>
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
       <form action = "questionMiddle3.php " method="POST">
       <input type="hidden" name="exam_id" value='.$row['id'].'>
       <input type="hidden" name="course_id" value='.$row['course_id'].'>
       <input type="hidden" name="course_name" value='.$row['name'].'>


       <input type="submit" class="btn btn-primary" name="verify" value="Select"> 
       </form>
       </td>';
       echo '</tr>';
     $i++;


     }
}
else{

    echo '<Center><br><br> <Br> <Br> <Br>
    <h4><strong style="color:red;">Sorry!!<strong><br> Course '.$course_name.' Has not Exam Till Now<h4> <center>';
    echo '<br><br> <Br> <Br> <Br>';
    echo '<form action="../admin/qustionmiddle.php" method="post">';
                echo  '<div class="form-group row">
     <div class="col-sm-3 ml-auto mr-auto">
   
       <button type="submit" class="form-control btn btn-primary" name="back">Proceed To Back</button>
     </div>'
     ;
     echo '<b><br>';
     echo '<form>';

}
     
     
   echo '</table>';
echo '<br><br>';

?>
