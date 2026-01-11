<?php 
session_start();

if(!isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:index.php");


?>
<script type="text/javascript" >
 function preventBack(){window.history.forward();}
 setTimeout("preventBack()", 0);
 window.onunload=function(){null};
 function change_section(section) {
    document.querySelectorAll(".section").forEach(a=>a.style.display = "none");
    document.querySelectorAll("."+section).forEach(a=>a.style.display = "block");
 }
</script>
<?php include("conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
    <!-- sidebar diri  -->
    <?php include("includes/sidebar.php"); ?>
    <?php
    if(isset($_GET['submit'])){
        $_SESSION['select'] = $_GET['select']; 
    }
    ?>
    <?php 
    $PID = $_SESSION['select']; 
    $selQ = $conn->query("SELECT * FROM epaper INNER JOIN examinee_tbl ON epaper.cou_id = examinee_tbl.exmne_course")->fetch(PDO::FETCH_ASSOC);
    $selExamTimeLimit = $selQ['TIMEL'];
    // $_SESSION['selExamTimeLimit'] = $selQ['TIMEL'];
    // $t = $_SESSION['selExamTimeLimit'];
    $marks =  $selQ['MARK1'];
?> <link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                  <div>PAPER - <?php echo $selQ['PNAME']; ?> </div>
              </div>
          </div>
      </div>        
     <div class="page-title-actions mr-5" style="font-size: 20px;">
                        <form name="cd">
                          <input type="hidden" name="" id="timeExamLimit" value="<?php echo $selExamTimeLimit; ?>">
                          <label>Remaining Time : </label>
                          <input style="border:none;background-color: transparent;color:blue;font-size: 25px;" name="disp" type="text" class="clock" id="txt" value="00:00" size="5" readonly="true" />
                      </form> 
                    </div> 


  <div class="col-md-10 p-0 mb-4">
    <form method="post" action="">
        <input type="hidden" name="PID" id="PID" value="<?php echo $PID ?>">
        <input type="hidden" name="examAction" id="examAction" >
        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">

         <div class="table-responsive">
            <table class="align-left mb-0 table table-borderless table-striped table-hover" id="tableList">
                <tbody>
                   <tr><td>
                      <a href="#" onclick="change_section('section1')">   <?php echo "SECTION 1" ?></a>
                  </td><td>
                     <a href="#" onclick="change_section('section2')">   <?php echo "SECTION 2" ?> </a>
                 </td>
                 <td>
                    <a href="#" onclick="change_section('section3')">  <?php echo "SECTION 3" ?> </a>
                </td>
                <td>
                   <a href="#" onclick="change_section('section4')"> <?php echo "SECTION 4" ?> </a>
                   <td>
                   </td>
               </tr>
           </tbody>
       </table>
   </div>
</div>
<div class="section section1 col-md-3 p-0 mb-4">
    <form method="post" action="">
        <input type="hidden" name="PID" id="PID" value="<?php echo $_SESSION['select'] ?>">
        <input type="hidden" name="examAction" id="examAction" >
        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
         <table class="align-left mb-0 table table-borderless table-striped table-hover" id="tableList">
            <thead>
                <th>Section 1</th>
            </thead>
            <tbody>
              <?php 
              $selQue1 = $conn->query("SELECT * FROM epaper INNER JOIN questionanswers ON epaper.course_id = questionanswers.course_id ")->fetch(PDO::FETCH_ASSOC);
              $M1L1=$selQue1['M1L1'];
              $M1L2=$selQue1['M1L2'];
              $M1L3=$selQue1['M1L3'];
              $M1L4=$selQue1['M1L4'];
              $M1L5=$selQue1['M1L5'];
              ?>
              <?php $questId = $selQue1['QID'];  
              $i = 1;  
              if($M1L1!=0){
                $usedQuest = [];
                for($r=1;$r<=$selQue1['MARK1'];$r++) {

                   $selQuest1 = $conn->query("SELECT DISTINCT(QUEST_ID),MARKS,QUESTION_DESC,QID,CHOICE_1,CHOICE_2,CHOICE_3,CHOICE_4 FROM questionanswers WHERE MARKS=1 AND DIFFICULTY=1 AND QUEST_ID not in ('".implode("', '", $usedQuest)."') ORDER BY rand()");

                   if($selQuest1->rowCount() > 0) {
                      $selQuestRow1 = $selQuest1->fetch(PDO::FETCH_ASSOC);
                      $usedQuest[] = $selQuestRow1['QUEST_ID'];

                      if($selQuestRow1['QID'] == 1) { 
                         ?>
                         <div>
                            <tr> 
                                <td>
                                    <p><b><?php echo $i++ ; ?> ) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p>
                                    <div class="col-md-4 float-left">
                                      <div class="form-group pl-5 "> 
                                        <input name="<?php echo $selQuestRow1['QUEST_ID']; ?>" value="<?php echo $selQuestRow1['CHOICE_1']; ?>" class="form-check-input" type="radio" value="" id="<?php echo $selQuestRow1['QUEST_ID']; ?>" required >

                                        <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                            <?php echo $selQuestRow1['QUEST_ID']; echo $selQuestRow1['CHOICE_1']; ?>
                                        </label>
                                    </div>  

                                    <div class="form-group pl-5">
                                        <input name="<?php echo $selQuestRow1['QUEST_ID']; ?>" value="<?php echo $selQuestRow1['CHOICE_2']; ?>" class="form-check-input" type="radio" value="" id="<?php echo $selQuestRow1['QUEST_ID']; ?>" required >

                                        <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                            <?php echo $selQuestRow1['CHOICE_2']; ?>
                                        </label>
                                    </div>   
                                </div>
                                <div class="col-md-8 float-left">
                                   <div class="form-group pl-5">
                                    <input name="<?php echo $selQuestRow1['QUEST_ID']; ?>" value="<?php echo $selQuestRow1['CHOICE_3']; ?>" class="form-check-input" type="radio" value="" id="<?php echo $selQuestRow1['QUEST_ID']; ?>" required >

                                    <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                        <?php echo $selQuestRow1['CHOICE_3']; ?>
                                    </label>
                                </div>  

                                <div class="form-group pl-5">
                                    <input name="<?php echo $selQuestRow1['QUEST_ID']; ?>" value="<?php echo $selQuestRow1['CHOICE_4']; ?>" class="form-check-input" type="radio" value="" id="<?php echo $selQuestRow1['QUEST_ID']; ?>" required >

                                    <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                        <?php echo $selQuestRow1['CHOICE_4']; ?>
                                    </label>
                                </div>   
                            </div>
                        </div>
                    </td>
                </tr>
            </div>
        <?php } else if($selQuestRow1['QID']==2) {  ?>
          <div>
              <tr>
                <td>
                    <p><b><?php echo $i++ ; ?> .) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p><br>
                    <div class="form-group pl-4 ">
                        <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="text" value="" id="invalidCheck" required >
                    </div>  
                </td>
            </tr>
        </div>
    <?php } else if($selQuestRow1['QID']==3) { ?>
      <div>
       <tr>
        <td>
            <p><b><?php echo $i++ ; ?> .) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p>
            <div class="form-group pl-4">
                <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="radio" value="" id="invalidCheck" required >TRUE &emsp;&emsp;
                <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="radio" value="" id="invalidCheck" required >FALSE
                <label class="form-check-label" for="invalidCheck">
                </label>
            </div> 

        </td>
    </tr>
</div>
<?php } } } }
if($M1L2!=0){
    for($r=1;$r<=$selQue1['MARK1'];$r++) {

       $selQuest1 = $conn->query("SELECT DISTINCT(QUEST_ID),MARKS,QUESTION_DESC,QID,CHOICE_1,CHOICE_2,CHOICE_3,CHOICE_4 FROM questionanswers WHERE MARKS=1 AND DIFFICULTY=2 ORDER BY rand()");

       if($selQuest1->rowCount() > 0) {
          $selQuestRow1 = $selQuest1->fetch(PDO::FETCH_ASSOC);
          echo $selQuestRow1['QUESTION_DESC'];
          if($selQuestRow1['QID'] == 1) { 
             ?>
             <div>
                <tr> 
                    <td>
                        <p><b><?php echo $i++ ; ?> ) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p>
                        <div class="col-md-4 float-left">
                          <div class="form-group pl-4 "> 
                            <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_1']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                            <label class="form-check-label" for="invalidCheck">
                                <?php echo $selQuestRow1['QUEST_ID']; echo $selQuestRow1['CHOICE_1']; ?>
                            </label>
                        </div>  

                        <div class="form-group pl-4">
                            <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_2']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                            <label class="form-check-label" for="invalidCheck">
                                <?php echo $selQuestRow1['CHOICE_2']; ?>
                            </label>
                        </div>   
                    </div>
                    <div class="col-md-8 float-left">
                       <div class="form-group pl-4">
                        <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_3']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                        <label class="form-check-label" for="invalidCheck">
                            <?php echo $selQuestRow1['CHOICE_3']; ?>
                        </label>
                    </div>  

                    <div class="form-group pl-4">
                        <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_4']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                        <label class="form-check-label" for="invalidCheck">
                            <?php echo $selQuestRow1['CHOICE_4']; ?>
                        </label>
                    </div>   
                </div>
            </div>
        </td>
    </tr>
</div>
<?php } else if($selQuestRow1['QID']==2) {  ?>
  <div>
      <tr>
        <td>
            <p><b><?php echo $i++ ; ?> .) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p><br>
            <div class="form-group pl-4 ">
                <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="text" value="" id="invalidCheck" required >
            </div>  
        </td>
    </tr>
</div>
<?php } else if($selQuestRow1['QID']==3) { ?>
  <div>
   <tr>
    <td>
        <p><b><?php echo $i++ ; ?> .) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p>
        <div class="form-group pl-4">
            <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="radio" value="" id="invalidCheck" required >TRUE &emsp;&emsp;
            <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="radio" value="" id="invalidCheck" required >FALSE
            <label class="form-check-label" for="invalidCheck">
            </label>
        </div> 

    </td>
</tr>
</div>
<?php } } } }
if($M1L3!=0){
    for($r=1;$r<=$selQue1['MARK1'];$r++) {

       $selQuest1 = $conn->query("SELECT DISTINCT(QUEST_ID),MARKS,QUESTION_DESC,QID,CHOICE_1,CHOICE_2,CHOICE_3,CHOICE_4 FROM questionanswers WHERE MARKS=1 AND DIFFICULTY=1 ORDER BY rand()");

       if($selQuest1->rowCount() > 0) {
          $selQuestRow1 = $selQuest1->fetch(PDO::FETCH_ASSOC);
          echo $selQuestRow1['QUESTION_DESC'];
          if($selQuestRow1['QID'] == 1) { 
             ?>
             <div>
                <tr> 
                    <td>
                        <p><b><?php echo $i++ ; ?> ) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p>
                        <div class="col-md-4 float-left">
                          <div class="form-group pl-4 "> 
                            <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_1']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                            <label class="form-check-label" for="invalidCheck">
                                <?php echo $selQuestRow1['QUEST_ID']; echo $selQuestRow1['CHOICE_1']; ?>
                            </label>
                        </div>  

                        <div class="form-group pl-4">
                            <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_2']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                            <label class="form-check-label" for="invalidCheck">
                                <?php echo $selQuestRow1['CHOICE_2']; ?>
                            </label>
                        </div>   
                    </div>
                    <div class="col-md-8 float-left">
                       <div class="form-group pl-4">
                        <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_3']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                        <label class="form-check-label" for="invalidCheck">
                            <?php echo $selQuestRow1['CHOICE_3']; ?>
                        </label>
                    </div>  

                    <div class="form-group pl-4">
                        <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_4']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                        <label class="form-check-label" for="invalidCheck">
                            <?php echo $selQuestRow1['CHOICE_4']; ?>
                        </label>
                    </div>   
                </div>
            </div>
        </td>
    </tr>
</div>
<?php } else if($selQuestRow1['QID']==2) {  ?>
  <div>
      <tr>
        <td>
            <p><b><?php echo $i++ ; ?> .) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p><br>
            <div class="form-group pl-4 ">
                <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="text" value="" id="invalidCheck" required >
            </div>  
        </td>
    </tr>
</div>
<?php } else if($selQuestRow1['QID']==3) { ?>
  <div>
   <tr>
    <td>
        <p><b><?php echo $i++ ; ?> .) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p>
        <div class="form-group pl-4">
            <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="radio" value="" id="invalidCheck" required >TRUE &emsp;&emsp;
            <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="radio" value="" id="invalidCheck" required >FALSE
            <label class="form-check-label" for="invalidCheck">
            </label>
        </div> 

    </td>
</tr>
</div>
<?php } } } }
if($M1L4!=0){
    for($r=1;$r<=$selQue1['MARK1'];$r++) {

       $selQuest1 = $conn->query("SELECT DISTINCT(QUEST_ID),MARKS,QUESTION_DESC,QID,CHOICE_1,CHOICE_2,CHOICE_3,CHOICE_4 FROM questionanswers WHERE MARKS=1 AND DIFFICULTY=1 ORDER BY rand()");

       if($selQuest1->rowCount() > 0) {
          $selQuestRow1 = $selQuest1->fetch(PDO::FETCH_ASSOC);
          echo $selQuestRow1['QUESTION_DESC'];
          if($selQuestRow1['QID'] == 1) { 
             ?>
             <div>
                <tr> 
                    <td>
                        <p><b><?php echo $i++ ; ?> ) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p>
                        <div class="col-md-4 float-left">
                          <div class="form-group pl-4 "> 
                            <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_1']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                            <label class="form-check-label" for="invalidCheck">
                                <?php echo $selQuestRow1['QUEST_ID']; echo $selQuestRow1['CHOICE_1']; ?>
                            </label>
                        </div>  

                        <div class="form-group pl-4">
                            <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_2']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                            <label class="form-check-label" for="invalidCheck">
                                <?php echo $selQuestRow1['CHOICE_2']; ?>
                            </label>
                        </div>   
                    </div>
                    <div class="col-md-8 float-left">
                       <div class="form-group pl-4">
                        <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_3']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                        <label class="form-check-label" for="invalidCheck">
                            <?php echo $selQuestRow1['CHOICE_3']; ?>
                        </label>
                    </div>  

                    <div class="form-group pl-4">
                        <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_4']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                        <label class="form-check-label" for="invalidCheck">
                            <?php echo $selQuestRow1['CHOICE_4']; ?>
                        </label>
                    </div>   
                </div>
            </div>
        </td>
    </tr>
</div>
<?php } else if($selQuestRow1['QID']==2) {  ?>
  <div>
      <tr>
        <td>
            <p><b><?php echo $i++ ; ?> .) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p><br>
            <div class="form-group pl-4 ">
                <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="text" value="" id="invalidCheck" required >
            </div>  
        </td>
    </tr>
</div>
<?php } else if($selQuestRow1['QID']==3) { ?>
  <div>
   <tr>
    <td>
        <p><b><?php echo $i++ ; ?> .) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p>
        <div class="form-group pl-4">
            <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="radio" value="" id="invalidCheck" required >TRUE &emsp;&emsp;
            <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="radio" value="" id="invalidCheck" required >FALSE
            <label class="form-check-label" for="invalidCheck">
            </label>
        </div> 

    </td>
</tr>
</div>
<?php } } } }
if($M1L5!=0){
    for($r=1;$r<=$selQue1['MARK1'];$r++) {

       $selQuest1 = $conn->query("SELECT DISTINCT(QUEST_ID),MARKS,QUESTION_DESC,QID,CHOICE_1,CHOICE_2,CHOICE_3,CHOICE_4 FROM questionanswers WHERE MARKS=1 AND DIFFICULTY=1 ORDER BY rand()");

       if($selQuest1->rowCount() > 0) {
          $selQuestRow1 = $selQuest1->fetch(PDO::FETCH_ASSOC);
          echo $selQuestRow1['QUESTION_DESC'];
          if($selQuestRow1['QID'] == 1) { 
             ?>
             <div>
                <tr> 
                    <td>
                        <p><b><?php echo $i++ ; ?> ) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p>
                        <div class="col-md-4 float-left">
                          <div class="form-group pl-4 "> 
                            <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_1']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                            <label class="form-check-label" for="invalidCheck">
                                <?php echo $selQuestRow1['QUEST_ID']; echo $selQuestRow1['CHOICE_1']; ?>
                            </label>
                        </div>  

                        <div class="form-group pl-4">
                            <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_2']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                            <label class="form-check-label" for="invalidCheck">
                                <?php echo $selQuestRow1['CHOICE_2']; ?>
                            </label>
                        </div>   
                    </div>
                    <div class="col-md-8 float-left">
                       <div class="form-group pl-4">
                        <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_3']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                        <label class="form-check-label" for="invalidCheck">
                            <?php echo $selQuestRow1['CHOICE_3']; ?>
                        </label>
                    </div>  

                    <div class="form-group pl-4">
                        <input name="$selQuestRow1['QUEST_ID']" value="<?php echo $selQuestRow1['CHOICE_4']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                        <label class="form-check-label" for="invalidCheck">
                            <?php echo $selQuestRow1['CHOICE_4']; ?>
                        </label>
                    </div>   
                </div>
            </div>
        </td>
    </tr>
</div>
<?php } else if($selQuestRow1['QID']==2) {  ?>
  <div>
      <tr>
        <td>
            <p><b><?php echo $i++ ; ?> .) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p><br>
            <div class="form-group pl-4 ">
                <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="text" value="" id="invalidCheck" required >
            </div>  
        </td>
    </tr>
</div>
<?php } else if($selQuestRow1['QID']==3) { ?>
  <div>
   <tr>
    <td>
        <p><b><?php echo $i++ ; ?> .) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p>
        <div class="form-group pl-4">
            <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="radio" value="" id="invalidCheck" required >TRUE &emsp;&emsp;
            <input name="$selQuestRow1['QUEST_ID']" class="form-check-input" type="radio" value="" id="invalidCheck" required >FALSE
            <label class="form-check-label" for="invalidCheck">
            </label>
        </div> 

    </td>
</tr>
</div>
<?php } } } }
?>

</table>
</div>
<div style="display: none;" class="section section2">
    <p>Temp section2</p>
</div>
<tr>
   <td style="padding: 20px;">
       <button type="button" style="width: 30%;" class="btn btn-xlg btn-warning p-3 pl-4 pr-4" id="resetExamFrm">Reset</button>
       <input name="submit" style="width: 30%;" type="submit" value="Submit" class="btn btn-xlg btn-primary p-3 pl-4 pr-4 float-right" >
   </td>
</tr> 
<?php include("includes/footer.php"); ?>
