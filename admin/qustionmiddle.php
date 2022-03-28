<?php
 session_start();

 if(!isset($_SESSION['username']) && !isset($_SESSION['usertype']))
 {
   header("location: ../index.php");
 }
 include 'include/header.php';
 include_once '../dbconn.php';

 echo '<bR><br>';
 echo '<center><h4 style="color:red">Select The course First!</h4>';

 echo '<center><h4>Here Is The List  Of Course .</h4>
                
 </center>';
 echo '<br>';
$sql="SELECT * FROM course";
$result=mysqli_query($conn,$sql);
echo '<table class="table" border="1px solid black">';
echo '<thead>
    <tr>
        <th>SN </th>
       <th>Course Name</th>
       <th>Action</Action</th>
    </tr>
</thead>';




if(mysqli_num_rows($result)>0)
{
  $i=1;
    while($row=mysqli_fetch_assoc($result))
    { 
      echo '<tr>';
       echo '<td>'.$i.'</td>';
       echo '<td>'.$row['name'].'</td>';
       echo '<td>
       <form action = "questionMiddle2.php " method="POST">
       <input type="hidden" name="id" value='.$row['id'].'>
       <input type="hidden" name="name" value='.$row['name'].'>

       <input type="submit" class="btn btn-primary" name="verify" value="Select"> 
       </form>
       </td>';
       echo '</tr>';
     $i++;


     }
    }
     
     
   echo '</table>';
   echo '<br> <b><br>';



?>
        <?php include 'include/footer.php'; ?>

   