<?php
$a=$_POST['exam_id'];
$b=$_POST['subject_id'];
echo $a;
echo '<bR>';
echo $b;

include_once '../dbconn.php';
$query = "INSERT INTO question_list(exam_id, subjects_id,ques,opt_a,opt_b,opt_c,opt_d,correct_opt) VALUES ('$a','$b','$question','$opt_a','$opt_b','$opt_c','$opt_d','$correct_option')";
$result = mysqli_query($conn, $query);
?>