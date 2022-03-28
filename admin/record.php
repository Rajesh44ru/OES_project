<?php
 session_start();
 include 'include/header.php'; 
 include_once '../dbconn.php';
 if(!isset($_SESSION['username']) && !isset($_SESSION['usertype']))
 {
   header("location: ../index.php");
 }
 echo '<bR><br>';
 echo '<center><h4>The Record Of The Student.</h4></center>';
 echo '<br>';
$sql="SELECT * FROM `login`WHERE user_type='student' ";
$result=mysqli_query($conn,$sql);
echo '<table class="table" border="1px solid black">';
echo '<thead>
    <tr>
        <th>SN </th>
        <th>NAME</th>
        <th>EMAIL </th>
        <th>PASSWORD</th>
        <th>ADDRESS</th>
        <th>COURSE</th>
        <th>Status</th>
        <th>Action</th>
        <th>Action</th>
    </tr>
</thead>';
if(mysqli_num_rows($result)>0)
{
    $i=1;
      while($row=mysqli_fetch_assoc($result))
      { 
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$row['username'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo '<td>'.$row['password'].'</td>';

        echo '<td>'.$row['address'].'</td>';
        echo '<td>'.$row['course'].'</td>';
        echo '<td>'.$row['verify'].'</td>';
        echo '<td>
        <form action = "verify.php " method="POST">
        <input type="hidden" name="id" value='.$row['id'].'>
        <input type="submit" class="btn btn-primary" name="verify" value="verify"> 
        </form>
        </td>';
        echo '<td>
        <form action = delete.php " method="POST">
        <input type="hidden" name="id" value='.$row['id'].'>
        <input type="submit" class="btn btn-danger" name="Delete" value="Remove"> 
        </form>
        </td>';
        
        
        
        
    

        echo '</tr>';
      $i++;


      }
    
}




 ?>