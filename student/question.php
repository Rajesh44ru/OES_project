<?php
      session_start();
      include('include/header.php');
      include_once '../dbconn.php';

     
          $exam_id = $_POST['exam_id'];
          $subjects_id = $_POST['subjects_id'];
          $login_id = $_SESSION['id'];
      



?>
<?php //***************timer part***************

include('timer/index.html');

 ?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>online Examination</title>
    <!--bootstrap import  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/jumbotron/">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <?php
			echo '<h1>Welcome To Online Examination system</h1>';
					echo '<h2 style="color:red;">Do not Refresh the page!!</h2>';
                  $q1="SELECT * from `question_list` where `exam_id`='$exam_id' and `subjects_id`='$subjects_id'";
                  //$result=mysqli_query($conn,$q1);
                  //$row=mysqli_fetch_assoc($result);
                   // echo $num_row;
				
				   
                   //
            ?>

            <?php
      $result=mysqli_query($conn,$q1);
	  $i=0;

      if(mysqli_num_rows($result)>0)
{
		  $arr_id =array();
		  $arr_ques=array();
		  $arr_opt_a=array();
		  $arr_opt_b=array();
		  $arr_opt_c=array();
		  $arr_opt_d=array();
		  $arr_corr =array();
          while($row=mysqli_fetch_assoc($result))
        { 
            $arr_id[$i]=$row['id'];
			$arr_ques[$i]=$row['ques'];
			$arr_opt_a[$i]=$row['opt_a'];
			$arr_opt_b[$i]=$row['opt_b'];
			$arr_opt_c[$i]=$row['opt_c'];
			$arr_opt_d[$i]=$row['opt_d'];
			$arr_corr[$i]=$row['correct_opt'];
		     $i++;
        }


}
$a=0;
echo '<form action="test1.php" method ="post">';
for($j=0;$j<$i;$j++)
{

	echo '<br>';
						echo '<div class="card">';
						echo '<div class="card-header">';
						echo '<strong>Question - ';echo $j+1;
						echo '</strong>'. $arr_ques[$j];
						echo '</div>';
						echo '<div class="card-body">';
						
						echo '<div class="row">';
						
						//iterating through current question options.
						
							echo '<div class="col-6">';
								echo '<div class="form-check" >';
								
									 echo '<input class="form-check-input" type="radio" value="A" id="ram" required="required"  name='.$j.'>';
									echo $arr_opt_a[$j];
									echo '<br>';
									
									 echo '<input class="form-check-input" value="B" type="radio" id="ram"  name='.$j.'>';
									 echo $arr_opt_b[$j];
									 echo '<br>';
									
									 echo '<input class="form-check-input" value="C" type="radio" id="ram" name='.$j.'>';
									 echo $arr_opt_c[$j];
									 echo '<br>';
									
									 echo '<input class="form-check-input" value="D" type="radio" id="ram" name='.$j.'>';
									 echo $arr_opt_d[$j];
									 echo '<br>';
                                      
								echo '</div>';
							echo '</div>';
						
					
						echo '</div>';
						echo '<br>';
		
						echo '</div>';
						echo '</div>';
	echo '<br>';

 
 
}
echo '<div class="form-group row">
  <div class="col-sm-3 ml-auto mr-auto">
<input type="hidden" name="imp" value= "'.$i.'">
<input type="hidden" name="subject_id" value= "'.$subjects_id.'">
<input type="hidden" name="exam_id" value= "'.$exam_id.'">


  <button type="submit" class="form-control btn btn-primary" name="submit" onclick="myfunction()">Submit</button>
  </div>';
echo '</form>';


 ?>
<?php 
//******************************** For  result calculation**********************************/
if(isset($_POST['submit']))
{






}





?>
<script type="text/javascript">
function myfunction(){

	


}


</script>
        

</div>
<?php include 'include/footer.php'; ?>

    </div>

</body>

</html>