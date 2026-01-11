
<?php 

include("../../conn.php");
if(isset($_POST['evaluate'])){
foreach($_POST['correct'] as $key => $val) {
    $ev = $conn->query("UPDATE takenpaper SET corrected='$val' WHERE quest_id='$key'");
  }
   if ($ev) {
  echo "<script>alert('Paper evaulation successfull');
      window.location.href='checkp.php';</script>";
} else {
  echo "<script>alert('Unable to evaluate paper');history.go(-1);</script>"; 
}
  }
?>