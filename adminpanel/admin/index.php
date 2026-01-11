<?php 
session_start();
if(isset($_SESSION['admin']['adminnakalogin']) == true) header("location:home.php");

include_once('../../conn.php');

if(!empty($_REQUEST['username']) && !empty($_REQUEST['pass']))
{
  $email = $_REQUEST['username'];
  $pwd = md5($_REQUEST['pass']);

  $selAcc = $conn->query("select * from admin_acc where admin_user='$email' and admin_pass='$pwd'");
  $selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);


  if($selAcc->rowCount() > 0)
  {
    $_SESSION['admin']['adminnakalogin'] = true;
    $_SESSION['name'] = $selAccRow['admin_id'];
    $_SESSION['course_id'] = $selAccRow['course_id'];
    header('location:home.php');

}
else
{
    $msg = "Invalid Credentials";
}



//   $select_query = mysqli_query($conn,"select * from admin_acc where admin_user='$email' and admin_pass='$pwd'");
//   $res = mysqli_num_rows($select_query);
//   // print_r($res);exit;
//   if($res>0)
//   {
//     $data = mysqli_fetch_array($select_query);
//     $name = $data['name'];
//     $_SESSION['name'] = $name;
//     header('location:adminpanel/admin/home.php');
// }
// else
// {
// }
}

include("../../login-ui/index.php");

?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/sweetalert.js"></script>