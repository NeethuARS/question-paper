<?php 
session_start();
if(isset($_SESSION['admin']['adminnakalogin']) == true) header("location:adindex.php");

 ?>

<?php 

include("login-ui/adindex.php");


 ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/sweetalert.js"></script>