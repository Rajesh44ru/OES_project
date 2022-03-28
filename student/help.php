if(isset($_POST['submit']))
      {
          $exam_id = $_POST['exam_id'];
          $subjects_id = $_POST['subjects_id'];
          $login_id = $_SESSION['id'];

          $query = "SELECT * from student_exam where login_id='$login_id' AND exam_id='$exam_id' AND subjects_id = '$subjects_id'";
          $result = mysqli_query($conn, $query);
          $res=mysqli_fetch_assoc($result);

          if(mysqli_num_rows($result)>0)
          {
            $_GLOBALS['message'] = 'You have already submitted this exam';
          }
          else
          {
            $query = "INSERT INTO student_exam(`login_id`, `exam_id`, `subjects_id`) VALUES ('$login_id','$exam_id','$subjects_id')";
            $result = mysqli_query($conn, $query);
            $insert_id = mysqli_insert_id($conn);
            if($result == true)
            {
            echo '<form action="question.php" method="post">';
            echo '<input type="hidden" name="exam_id" value="'.$exam_id.'">';
            echo '<input type="hidden" name="subjects_id" value="'.$subjects_id.'">';
            echo '</form>';
            header("Location:question.php");


            }
          }
        }