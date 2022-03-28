<?php

 

error_reporting(0);
session_start();
include_once 'dbconn.php';

if(isset($_POST['submit']))
{
   $username = ucwords($_POST['username']);
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $email = $_POST['email'];
   $mobile = $_POST['mobile'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $pin = $_POST['pin'];
   $courseid=$_POST['course'];

   $query="SELECT * from course where id=$courseid ";
   $result4=mysqli_query($conn,$query);
   $row=mysqli_fetch_assoc($result4);
    $n= $row['name'];
   




   if($password != $cpassword)
   {
     $_GLOBALS['message'] = 'Password and confirm password are not same';
   }
   else
   {
     $query = "SELECT  * from login where username='$username' and course='$n'";
     $result = mysqli_query($conn, $query);
     if(mysqli_num_rows($result)>0)
     {
       echo mysqli_num_rows($result);
       $_GLOBALS['message'] = 'User name already exist';
     }
     else
     {
       $query = "INSERT INTO login(`username`, `password`, `email`, `mobile`, `address`, `city`, `pin`,`user_type`,`course`,`verify`) VALUES ('$username','$password','$email','$mobile','$address','$city','4401','student','$row[name]','0')";
       $result = mysqli_query($conn, $query);
       
       if($result == true)
       {
         $_GLOBALS['message'] = 'You have registered successfully';
         unset($username);unset($email);unset($mobile);unset($pin);unset($city);unset($address);
       }
       else
       {
         $_GLOBALS['message'] = 'Registration Failed';
       }

     }
   }
}
?>
<?php include 'include/header.php'; ?>
 <div class="row middle-header">
   <div class="col-sm-12 p-2 text-right">
     <a href="index.php" class="btn btn-primary">Login</a>
   </div>
 </div>
 <div class="row p-5" style="background: #fafafa;">
   <div class="col-sm-3">
   </div>
   <div class="col-sm-6">
     <?php
       if(isset($_GLOBALS['message']))
       {
        echo "<div class='alert alert-success'>".$_GLOBALS['message']."</div>";
       }
     ?>
     <form method="post" action="register.php">
       <div class="form-group row">
         <label class="col-sm-4 col-form-label">User Name :-</label>
         <div class="col-sm-7">
           <input type="text" class="form-control" placeholder="User Name" name="username" placeholder="Enter Username" required="">
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-4 col-form-label">Password :-</label>
         <div class="col-sm-7">
           <input type="password" class="form-control" id="" placeholder="Enter Password" name="password" required=""> 
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-4 col-form-label">Confirm Password :-</label>
         <div class="col-sm-7">
           <input type="password" class="form-control" id="" placeholder="Enter Confirm Password" name="cpassword" required=""> 
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-4 col-form-label">Email Address :-</label>
         <div class="col-sm-7">
           <input type="email" class="form-control" id="eone" placeholder="Enter Email" name="email" required="" value="<?php if(isset($email)){ echo $email; }?>"> 
           <Span style="color:red;"><p id="error" ></span>
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-4 col-form-label">Mobile Number :-</label>
         <div class="col-sm-7">
           <input type="text" class="form-control" id="" placeholder="Enter Mobile" name="mobile" required="" value="<?php if(isset($mobile)){ echo $mobile; }?>"> 
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-4 col-form-label">Address :-</label>
         <div class="col-sm-7">
           <textarea class="form-control" name="address" placeholder="Address" required=""><?php if(isset($address)){
             echo $address;
           } ?></textarea>
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-4 col-form-label">City :-</label>
         <div class="col-sm-7">
           <input type="text" class="form-control" id="" placeholder="Enter City" name="city" required="" value="<?php if(isset($city)){ echo $city; }?>"> 
         </div>
       </div>
       <?php
        $query = "SELECT * FROM course";
        $result = mysqli_query($conn, $query);
       ?>
       <div class="form-group row">
       <label class="col-sm-4 col-form-label">Course Name :-</label>
                    <div class="col-sm-7">
                     <select class="form-control" name="course" required="">
                       <option value="">Select Course</option>
                       <?php if(!empty($result)){ ?>
                        <?php while($row = mysqli_fetch_array($result)){ ?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                      <?php } ?>
                     </select>
                    </div>
       </div>
       
       <br>
       <div class="form-group row">
         <div class="col-sm-4 ml-auto">
           <button class="btn btn-primary" name="submit" type="submit" onclick="Validate()">Register</button>
         </div>
         <div class="col-sm-4 ml-auto">
           <button class="btn btn-danger" type="reset">Reset</button>
         </div>
       </div>
     </form>
   </div>
 </div>
<?php include 'include/footer.php'; ?>
<script>
function Validate()
{
 document.getElementById("error").innerhtml="invalid email";
 

}


</script>