<?php 
      // error_reporting(0);
      session_start();
     $n=$_SESSION['id'];
      if(!isset($_SESSION['username']) && !isset($_SESSION['student']))
      {
        header("location: ../index.php");
      }
      include_once '../dbconn.php';

      // if(isset($_POST['submit']))
      // {

      //   header("Location:question.php");
      // }

     //for selecting course name
     $query1="SELECT `course` from login where id=$n";
     $result1=mysqli_query($conn,$query1);
     $row=mysqli_fetch_assoc($result1);
     $course_name=$row['course'];
     //echo $course_name;
     //for course id
     $query2="SELECT `id` FROM course  where name='$course_name'";
     $result2=mysqli_query($conn,$query2);
     $row2=mysqli_fetch_assoc($result2);
     $course_id=$row2['id'];









      
      $query = "SELECT * FROM exam where course_id=$course_id";
      $exam = mysqli_query($conn, $query);
      $query = "SELECT * FROM subjects where course_id=$course_id";
      $subjects = mysqli_query($conn, $query);
     
 ?>
 <?php include 'include/header.php'; ?>
        
        <div class="row p-5" style="background: #fafafa;">
          <div class="col-sm-6 ml-auto">
            <?php
              if(isset($_GLOBALS['message']))
              {
               echo "<div class='alert alert-danger'>".$_GLOBALS['message']."</div>";
              }
            ?>
            
            <form method="post" action="questionm.php">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Exam :</label>
                <div class="col-sm-9">
                  <select class="form-control" name="exam_id" required="">
                    <option value="">Select Exam</option>
                    <?php if(!empty($exam)){ ?>
                      <?php while($row = mysqli_fetch_array($exam)){ ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                      <?php } ?>
                    <?php } ?>
                  </select>
                 
                 
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Subject :</label>
                <div class="col-sm-9">
                  <select class="form-control" name="subjects_id" required="">
                    <option value="">Select Subject</option>
                    <?php if(!empty($subjects)){ ?>
                      <?php while($row1 = mysqli_fetch_assoc($subjects)){ ?>
                        <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                      <?php } ?>
                      
                    <?php } ?>
                  </select>
                </div>
              </div>

<div class="form-group row">
  <div class="col-sm-3 ml-auto mr-auto">

    <button type="submit" class="form-control btn btn-primary" name="submit">Start</button>
  </div>
</div>

</form>


          </div>
         
          <div class="col-sm-3">
            
          </div>
     
        </div>
        
       
     
        <?php 
       
       

        
        include 'include/footer.php'; ?>
