<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"/> -->
  <script type="text/javascript">
    // $('select').change(function(event) {
    //   console.log(this);
    // });
    function selectChange() {
      // console.log(this);
    }
    function multiply1() {
      num1 = document.getElementById("mark1"). value;
      a = (num1 * 1);
      document.getElementById('ttl1').value = a;
    }
    function multiply2() {
      num2 = document.getElementById("mark2"). value;
      b = (num2 * 2);
      document.getElementById('ttl2').value = b;
    }
    function multiply5() {
      num5 = document.getElementById("mark5"). value;
      c = (num5 * 3);
      document.getElementById('ttl5').value = c;
    }
    function multiply7() {
      num7 = document.getElementById("mark7"). value;
      d = (num7 * 5);
      document.getElementById('ttl7').value = d;
    }
    function totall() {
      var a = parseInt(document.getElementById('ttl1').value);
      var b = parseInt(document.getElementById('ttl2').value);
      var c = parseInt(document.getElementById('ttl5').value);
      var d = parseInt(document.getElementById('ttl7').value);
      document.getElementById('total').value = a + b + c + d;
    }
  </script>
</head>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
  <!-- sidebar diri  -->
  <?php include("includes/sidebar.php"); ?>
  <?php 
  if(isset($_GET['pid'])){
    $select = $_GET['pid'];
  }
  $selQue = $conn->query("SELECT * FROM epaper INNER JOIN course_tbl ON epaper.cou_id = course_tbl.cou_id where epaper.PID = ".$select);
  if(!$selQue->rowCount()) {
    throw new Exception("Error Processing Request", 1);
  }
  $selQueRow = $selQue->fetch(PDO::FETCH_ASSOC);
  ?>
  <div class="app-main__outer">
    <div class="app-main__inner">
      <div class="app-page-title">
        <div class="page-title-wrapper">
         <div class="page-title-heading"><div> MANAGE PAPERS 
         </div>
       </div>
     </div>
   </div> 
   <div class="col-md-12">
    <div id="refreshData">
      <div class="row">
        <div class="col-md-10">
          <div class="main-card mb-3 card">
            <div class="card-header">
              <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Paper Information <?php echo $selQueRow['PNAME']; ?>
            </div>
            <div class="card-body">
              <form action="testpageconn.php" method="post">
               <div class="form-group">
                <label>Paper ID</label>
                <input type="" name="pname" id="pname" class="form-control" value="<?php echo $selQueRow['PID']?>">
                <label>Section 1 Questions &emsp; &emsp; &emsp; Difficulty level: &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&nbsp;   Total Marks:</label><br>
                <input type="number" value="<?php echo $selQueRow['MARK1']; ?>" onclick="multiply1();" min="0" max="10" name="mark1" id="mark1" class="txtbx" method="post" readonly>   
                &emsp;&emsp;&emsp; &emsp; &emsp; &emsp;
                <select class="dropdown" name="m1l1" onchange="selectChange();" style="border-color: #27fe00;">
                 <option value="0">L-1</option><?php for($i=1; $i<=$selQueRow['MARK1']; $i++)
                 { echo "<option value=".$i.">".$i."</option>";}?>
               </select> 
               <select class="dropdown" name="m1l2" style="border-color: #36ec00;">
                 <option value="0">L-2</option><?php for($i=1; $i<=$selQueRow['MARK1']; $i++)
                 { echo "<option value=".$i.">".$i."</option>";}?>
               </select> 
               <select class="dropdown" name="m1l3" style="border-color:#7a9c00">
                 <option value="0">L-3</option><?php for($i=1; $i<=$selQueRow['MARK1']; $i++)
                 { echo "<option value=".$i.">".$i."</option>";}?>
               </select> 
               <select class="dropdown" name="m1l4" style="border-color:#bc4e00;">
                 <option value="0">L-4</option><?php for($i=1; $i<=$selQueRow['MARK1']; $i++)
                 { echo "<option value=".$i.">".$i."</option>";}?>
               </select> 
               <select class="dropdown" name="m1l5" style="border-color: #ff0000;">
                 <option value="0">L-5</option><?php for($i=1; $i<=$selQueRow['MARK1']; $i++)
                 { echo "<option value=".$i.">".$i."</option>";}?>
               </select> 
               &emsp;&emsp;&emsp;&emsp;<input type="number" id="ttl1" value="<?php echo ($selQueRow['MARK1'] * 1); ?>" min="0" readonly> 
             </div>

             <div class="form-group">
              <label>Section 2 Questions &emsp; &emsp; &emsp; Difficulty level: &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&nbsp;   Total Marks:</label><br>
              <input type="number" value="<?php echo $selQueRow['MARK2']; ?>" onclick="multiply2();" min="0" max="10" name="mark2" id="mark2" class="txtbx" method="post" readonly> 
              &emsp;&emsp;&emsp; &emsp; &emsp; &emsp;
              <select class="dropdown" name="m2l1" style="border-color: #27fe00;">
               <option value="0">L-1</option><?php for($i=1; $i<=$selQueRow['MARK2']; $i++)
               { echo "<option value=".$i.">".$i."</option>";}?>
             </select> 
             <select class="dropdown" name="m2l2" style="border-color: #36ec00;">
               <option value="0">L-2</option><?php for($i=1; $i<=$selQueRow['MARK2']; $i++)
               { echo "<option value=".$i.">".$i."</option>";}?>
             </select> 
             <select class="dropdown" name="m2l3" style="border-color:#7a9c00">
               <option value="0">L-3</option><?php for($i=1; $i<=$selQueRow['MARK2']; $i++)
               { echo "<option value=".$i.">".$i."</option>";}?>
             </select> 
             <select class="dropdown" name="m2l4" style="border-color:#bc4e00;">
               <option value="0">L-4</option><?php for($i=1; $i<=$selQueRow['MARK2']; $i++)
               { echo "<option value=".$i.">".$i."</option>";}?>
             </select> 
             <select class="dropdown" name="m2l5" style="border-color: #ff0000;">
               <option value="0">L-5</option><?php for($i=1; $i<=$selQueRow['MARK2']; $i++)
               { echo "<option value=".$i.">".$i."</option>";}?>
             </select> 
             &emsp;&emsp;&emsp;&emsp;<input type="number" id="ttl2" value="<?php echo ($selQueRow['MARK2'] * 2); ?>" min="0" readonly> 
           </div>
           <div class="form-group">
            <label>Section 3 Questions &emsp; &emsp; &emsp;Difficulty level: &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&nbsp;   Total Marks:</label><br>
            <input type="number" value="<?php echo $selQueRow['MARK3']; ?>" onclick="multiply5();" min="0" max="10" name="mark5" id="mark5" class="txtbx" method="post" readonly> 
            &emsp;&emsp;&emsp; &emsp; &emsp; &emsp;
            <select class="dropdown" name="m3l1" style="border-color: #27fe00;">
             <option value="0">L-1</option><?php for($i=1; $i<=$selQueRow['MARK3']; $i++)
             { echo "<option value=".$i.">".$i."</option>";}?>
           </select> 
           <select class="dropdown" name="m3l2" style="border-color: #36ec00;">
             <option value="0">L-2</option><?php for($i=1; $i<=$selQueRow['MARK3']; $i++)
             { echo "<option value=".$i.">".$i."</option>";}?>
           </select> 
           <select class="dropdown" name="m3l3" style="border-color:#7a9c00">
             <option value="0">L-3</option><?php for($i=1; $i<=$selQueRow['MARK3']; $i++)
             { echo "<option value=".$i.">".$i."</option>";}?>
           </select> 
           <select class="dropdown" name="m3l4" style="border-color:#bc4e00;">
             <option value="0">L-4</option><?php for($i=1; $i<=$selQueRow['MARK3']; $i++)
             { echo "<option value=".$i.">".$i."</option>";}?>
           </select> 
           <select class="dropdown" name="m3l5" style="border-color: #ff0000;">
             <option value="0">L-5</option><?php for($i=1; $i<=$selQueRow['MARK3']; $i++)
             { echo "<option value=".$i.">".$i."</option>";}?>
           </select> 

           &emsp;&emsp;&emsp;&emsp;<input type="number" id="ttl5" value="<?php echo ($selQueRow['MARK3'] * 3); ?>" min="0" readonly> 
         </div>

         <div class="form-group">
          <label>Section 5 Questions &emsp; &emsp; &emsp;Difficulty level: &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&nbsp;   Total Marks:</label><br>
          <input type="number" value="<?php echo $selQueRow['MARK5']; ?>" onclick="multiply7();" min="0" max="10" name="mark7" id="mark7" class="txtbx" method="post" readonly> 
          &emsp;&emsp;&emsp; &emsp; &emsp; &emsp;
          <select class="dropdown" name="m5l1" style="border-color: #27fe00;">
           <option value="0">L-1</option><?php for($i=1; $i<=$selQueRow['MARK5']; $i++)
           { echo "<option value=".$i.">".$i."</option>";}?>
         </select> 
         <select class="dropdown" name="m5l2" style="border-color: #36ec00;">
           <option value="0">L-2</option><?php for($i=1; $i<=$selQueRow['MARK5']; $i++)
           { echo "<option value=".$i.">".$i."</option>";}?>
         </select> 
         <select class="dropdown" name="m5l3" style="border-color:#7a9c00">
           <option value="0">L-3</option><?php for($i=1; $i<=$selQueRow['MARK5']; $i++)
           { echo "<option value=".$i.">".$i."</option>";}?>
         </select> 
         <select class="dropdown" name="m5l4" style="border-color:#bc4e00;">
           <option value="0">L-4</option><?php for($i=1; $i<=$selQueRow['MARK5']; $i++)
           { echo "<option value=".$i.">".$i."</option>";}?>
         </select> 
         <select class="dropdown" name="m5l5" style="border-color: #ff0000;">
           <option value="0">L-5</option><?php for($i=1; $i<=$selQueRow['MARK5']; $i++)
           { echo "<option value=".$i.">".$i."</option>";}?>
         </select> 

         &emsp;&emsp;&emsp;&emsp;<input type="number" id="ttl7" value="<?php echo ($selQueRow['MARK5'] * 5); ?>" min="0" readonly>
       </div>

       <div class="form-group">
        <label>Total Marks</label>
        <input type="number" id="total" name="total" placeholder="click here" onfocus="totall()" readonly class="form-control"/> 
      </div> 
      <div>
        <label>Time Limit</label>
        <input type="" name="time" id="time" class="form-control" required="">
      </div><br>
      <label>Total Questions</label>
                <input type="" name="totalq" id="pname" class="form-control" value="<?php echo $selQueRow['MARK1'] + $selQueRow['MARK2'] + $selQueRow['MARK2'] + $selQueRow['MARK3'] + $selQueRow['MARK5'] ?>">
      <br>
      <div>
        <button name="submit" class="btn btn-primary">Submit</button>
      </div>     
    </div>
  </div>
</div>
</form>
</section>
<?php include("includes/footer.php"); ?>
