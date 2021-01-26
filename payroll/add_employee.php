<?php
$con = mysqli_connect("localhost","root","","payroll");
    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 

  if(isset($_POST['submit'])!="")
  {
    $lname      = $_POST['lname'];
    $fname      = $_POST['fname'];
    $gender     = $_POST['gender'];
    $type       = $_POST['emp_type'];
    $division   = $_POST['division'];

    $sql = mysqli_query($con,"INSERT into employee(lname, fname, gender, emp_type, division)VALUES('$lname','$fname','$gender', '$type', '$division')");

    if($sql)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='index.php';
        </script>
      <?php 
    }
  }
?>