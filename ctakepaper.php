<?php 
 session_start();
 include("conn.php");
$exmneId = $_SESSION['examineeSession']['exmne_id'];
 

extract($_POST);

 $selExamAttmpt = $conn->query("SELECT * FROM paper_attempt WHERE exmne_id='$exmneId' AND PID='$thisId' ");

 if($selExamAttmpt->rowCount() > 0)
 {
 	echo "<script>alert('Paper Already TAKEN');
      window.location.href='qpaper.php';</script>";
}
 else
 {
 	echo "<script>alert('Are you sure?');
      window.location.href='takepaper1.php';</script>";
}

 echo json_encode($res);
 ?>