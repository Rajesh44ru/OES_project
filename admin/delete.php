<?php
$i=$_POST['id'];

echo $i;
include_once '../dbconn.php';
$sql="DELETE  FROM login where id=$i ";
$result=mysqli_query($conn,$sql);
if($result){
Header("Location:record.php");
}else{
    Header("Location:record.php");

}

?>