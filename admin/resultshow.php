<?php
 session_start();
 include 'include/header.php';
 include_once '../dbconn.php';
 
 if(!isset($_SESSION['username']) && !isset($_SESSION['usertype']))
 {
   header("location: ../index.php");
 }
 $eid=$_POST['exam_name'];
 $sname=ucwords($_POST['student_name']);
//echo $eid;
//echo ucwords($sname);
$sql4="SELECT * from `student_exam` where exam_id='$eid'";
$result4=mysqli_query($conn,$sql4);
$count=mysqli_num_rows($result4);
//echo $count;
$nameId=array();
$name=array();
$i=0;

while($row4=mysqli_fetch_array($result4))
{  
   $nameId[$i]=$row4['login_id'];
   $sql5="SELECT   `username` from login where id='$nameId[$i]'";

   $result5=mysqli_query($conn,$sql5);
   $row5=mysqli_fetch_assoc($result5);
   $name[$i]=$row5['username'];

   $i++;

}
$a=false;
for($i=0;$i<$count;$i++)
{
  if($name[$i]==$sname)
  {
     $a=true;
  }
}
if($a==false)
{
 echo '<Center><br><br> <Br> <Br> <Br>
 <h4><strong style="color:red;">Sorry!!<br> Please Enter Valid Name.<h4><strong> <center>';
 echo '<br><br> <Br> <Br> <Br>';
 echo '<form action="../admin/result.php" method="post">';
             echo  '<div class="form-group row">
  <div class="col-sm-3 ml-auto mr-auto">

    <button type="submit" class="form-control btn btn-primary" name="back">Proceed To Back</button>
  </div>'
  ;
  echo '<b><br>';
  echo '<form>';
}
else
{



   $sql1="SELECT * from `exam` where id='$eid'";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($result1);
     $ename=$row1['name'];


    $sql="SELECT * from `result` where exam_name= '$ename' And student_name='$sname'";
     
    echo '<br><br>
    Name of Student :-
     &nbsp;&nbsp;<b>'.$sname.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Exam Title :-&nbsp;&nbsp;<b>'.ucwords($ename).'</b>';
     echo '<br> <br>';

     echo '<table class="table" border="1px solid black">';
    echo '<thead>
        <tr>
            <th>SN </th>
            <th>COURSE</th>
            <th>SUBJECTS </th>
            <th>SCORE</th>
        </tr>
    </thead>';
  
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        $i=1;
          while($row=mysqli_fetch_assoc($result))
          { 
            echo '<tr>';
             echo '<td>'.$i.'</td>';
             echo '<td>'.$row['course_name'].'</td>';
             echo '<td>'.$row['subject_name'].'</td>';
             echo '<td>'.$row['score'].'</td>';
             echo '</tr>';
           $i++;


           }
          }
           
           
         echo '</table>';
  
}


?>

