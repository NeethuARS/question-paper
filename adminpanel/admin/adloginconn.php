<?php

  if(isset($_POST["adminid"])) 
  {
      $a=$_POST['adminid'];
      $b=$_POST['password'];

     $conn = mysqli_connect("localhost","root", "", "UQUIZDB");
      $sql = "SELECT * FROM admin WHERE ADMINID='" .$a. "'AND PASSWORD='" .$b. "'";
      $search_result=mysqli_query($conn, $sql);

      $userfound=mysqli_num_rows($search_result);

 
      if($userfound >= 1)
      {
           echo "<script>alert('Logged in Successfully');
          window.location.href='homead.php';</script>";
      }
      else
      {
               echo "<script>alert('Incorrect Password or Admin ID');
          window.location.href='adminpanel/admin/adlogin.php';</script>";
      }
    }

 ?>