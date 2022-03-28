<?php
$i=$_POST['id'];

echo $i;
include_once '../dbconn.php';
$sql="SELECT   `verify` FROM login where id=$i ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
if($row['verify']==0)
{
$sql1="UPDATE `login` SET verify=1 where id=$i";
$result1=mysqli_query($conn,$sql1);
Header("location:record.php");
}else{
    Header("Location:record.php");
}
?>