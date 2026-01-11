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
    if(isset($_POST['submit'])){
       $PID = $_POST['pid'];

extract($_POST);

 $selExamAttmpt = $conn->query("SELECT * FROM paper_attempt WHERE exmne_id='$exmneId' AND PID='$PID' ");

 if($selExamAttmpt->rowCount() > 0)
 {
  echo "<script>alert('Paper already attempted');
          window.location.href='home.php';</script>";
 }
 else
 {
  echo "<script>alert('Are you sure');</script>";
 }
}
    $selQ = $conn->query("SELECT * FROM epaper INNER JOIN examinee_tbl ON epaper.cou_id = examinee_tbl.exmne_course where epaper.PID = ".$PID)->fetch(PDO::FETCH_ASSOC);
    $selExamTimeLimit = $selQ['TIMEL'];
    $marks =  $selQ['MARK1'];
    $cid = $selQ['exmne_id'];
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
<form method="post" action="takepaperconn.php">
            <input type="hidden" name="pid" id="pid" value="<?php echo $PID; ?>">
    <div class="section section1 col-md-3 p-0 mb-4">
        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
         <table class="align-left mb-0 table table-borderless table-striped table-hover" id="tableList">
            <thead>
                <th>Section 1</th>
            </thead>
            <tbody>
              <?php 
              $M1L1=$selQ['M1L1'];
              $M1L2=$selQ['M1L2'];
              $M1L3=$selQ['M1L3'];
              $M1L4=$selQ['M1L4'];
              $M1L5=$selQ['M1L5'];
              ?>
              <?php $questId = $selQ['PID'];  
              $i = 1;
              $usedQuest = [1=>[]];
              $diff_level = 1;
              for($r=1;$r<=$selQ['MARK1'];$r++) {
                while ($diff_level < 6 && count($usedQuest[$diff_level]) == $selQ['M1L'.$diff_level]) {
                    $diff_level++;
                    if (empty($usedQuest[$diff_level])) {
                        $usedQuest[$diff_level] = [];
                    }
                }

                $cou_id=$selQ['cou_id']; 
                $selQuest1 = $conn->query("SELECT DISTINCT(QUEST_ID),MARKS,QUESTION_DESC,QID,CHOICE_1,CHOICE_2,CHOICE_3,CHOICE_4 FROM questionanswers WHERE MARKS=1 AND cou_id=$cou_id AND DIFFICULTY=$diff_level AND QUEST_ID not in ('".implode("', '", $usedQuest[$diff_level])."') ORDER BY rand()");


                   if($selQuest1->rowCount() > 0) {
                      $selQuestRow1 = $selQuest1->fetch(PDO::FETCH_ASSOC);
                      $usedQuest[$diff_level][] = $selQuestRow1['QUEST_ID'];
                      if($selQuestRow1['QID'] == 1) { 
                         ?>
                         <div>
                            <tr> 
                                <td>
                                    <p><b><?php echo $i++ ; ?> ) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p>
                                    <div class="col-md-4 float-left">
                                      <div class="form-group pl-5 "> 
                                        <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_1']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                                        <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                            <?php echo $selQuestRow1['CHOICE_1']; ?>
                                        </label>
                                    </div>  

                                    <div class="form-group pl-5">
                                        <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_2']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                                        <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                            <?php echo $selQuestRow1['CHOICE_2']; ?>
                                        </label>
                                    </div>   
                                </div>
                                <div class="col-md-8 float-left">
                                   <div class="form-group pl-5">
                                    <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_3']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required>

                                    <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                        <?php echo $selQuestRow1['CHOICE_3']; ?>
                                    </label>
                                </div>  

                                <div class="form-group pl-5">
                                    <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_4']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required>

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
                        <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" class="form-check-input" type="text" value="" id="invalidCheck" required>
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
                <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" class="form-check-input" type="radio" value="T" id="invalidCheck" required>TRUE &emsp;&emsp;
                <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" class="form-check-input" type="radio" value="F" id="invalidCheck" required>FALSE
                <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                </label>
            </div> 

        </td>
    </tr>
</div>
<?php } } } ?>
</div>
</tbody>
</table>
</table>
</div>
<div style="display: none;" class="section section2 col-md-3 p-0 mb-4">
    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
     <table class="align-left mb-0 table table-borderless table-striped table-hover" id="tableList">
        <thead>
            <th>Section 2</th>
        </thead>
        <tbody>
          <?php 
          $M1L1=$selQ['M1L1'];
          $M1L2=$selQ['M1L2'];
          $M1L3=$selQ['M1L3'];
          $M1L4=$selQ['M1L4'];
          $M1L5=$selQ['M1L5'];
          ?>
          <?php $questId = $selQ['PID'];  
          $i = 1;  
          $usedQuest = [1=>[]];
          $diff_level = 1;
          for($r=1;$r<=$selQ['MARK2'];$r++) {
            while ($diff_level < 6 && count($usedQuest[$diff_level]) == $selQ['M2L'.$diff_level]) {
                $diff_level++;
                if (empty($usedQuest[$diff_level])) {
                    $usedQuest[$diff_level] = [];
                }
            }

            $cou_id=$selQ['cou_id']; 
            $selQuest1 = $conn->query("SELECT DISTINCT(QUEST_ID),MARKS,QUESTION_DESC,QID,CHOICE_1,CHOICE_2,CHOICE_3,CHOICE_4 FROM questionanswers WHERE MARKS=2 AND cou_id=$cou_id AND DIFFICULTY=$diff_level AND QUEST_ID not in ('".implode("', '", $usedQuest[$diff_level])."') ORDER BY rand()");

               if($selQuest1->rowCount() > 0) {
                  $selQuestRow1 = $selQuest1->fetch(PDO::FETCH_ASSOC);
                  $usedQuest[$diff_level][] = $selQuestRow1['QUEST_ID'];
                  if($selQuestRow1['QID'] == 1) { 
                         ?>
                         <div>
                            <tr> 
                                <td>
                                    <p><b><?php echo $i++ ; ?> ) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p>
                                    <div class="col-md-4 float-left">
                                      <div class="form-group pl-5 "> 
                                        <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_1']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                                        <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                            <?php echo $selQuestRow1['CHOICE_1']; ?>
                                        </label>
                                    </div>  

                                    <div class="form-group pl-5">
                                        <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_2']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                                        <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                            <?php echo $selQuestRow1['CHOICE_2']; ?>
                                        </label>
                                    </div>   
                                </div>
                                <div class="col-md-8 float-left">
                                   <div class="form-group pl-5">
                                    <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_3']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required>

                                    <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                        <?php echo $selQuestRow1['CHOICE_3']; ?>
                                    </label>
                                </div>  

                                <div class="form-group pl-5">
                                    <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_4']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required>

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
                        <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" class="form-check-input" type="text" value="" id="invalidCheck" required>
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
                <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" class="form-check-input" type="radio" value="T" id="invalidCheck" required>TRUE &emsp;&emsp;
                <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" class="form-check-input" type="radio" value="F" id="invalidCheck" required>FALSE
                <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                </label>
            </div> 

        </td>
    </tr>
</div>
<?php } } } ?>
</div>
</tbody>
</table>
</table>
</div>
<div style="display: none;" class="section section3">
    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
     <table class="align-left mb-0 table table-borderless table-striped table-hover" id="tableList">
        <thead>
            <th>Section 3</th>
        </thead>
        <tbody>
          <?php 
          $M1L1=$selQ['M1L1'];
          $M1L2=$selQ['M1L2'];
          $M1L3=$selQ['M1L3'];
          $M1L4=$selQ['M1L4'];
          $M1L5=$selQ['M1L5'];
          ?>
           <?php $questId = $selQ['PID'];  
          $i = 1;  
          $usedQuest = [1=>[]];
          $diff_level = 1;
          for($r=1;$r<=$selQ['MARK3'];$r++) {
            while ($diff_level < 6 && count($usedQuest[$diff_level]) == $selQ['M3L'.$diff_level]) {
                $diff_level++;
                if (empty($usedQuest[$diff_level])) {
                    $usedQuest[$diff_level] = [];
                }
            }

            $cou_id=$selQ['cou_id']; 
            $selQuest1 = $conn->query("SELECT DISTINCT(QUEST_ID),MARKS,QUESTION_DESC,QID,CHOICE_1,CHOICE_2,CHOICE_3,CHOICE_4 FROM questionanswers WHERE MARKS=3 AND cou_id=$cou_id AND DIFFICULTY=$diff_level AND QUEST_ID not in ('".implode("', '", $usedQuest[$diff_level])."') ORDER BY rand()");

               if($selQuest1->rowCount() > 0) {
                  $selQuestRow1 = $selQuest1->fetch(PDO::FETCH_ASSOC);
                  $usedQuest[$diff_level][] = $selQuestRow1['QUEST_ID'];
                  if($selQuestRow1['QID'] == 1) { 
                         ?>
                         <div>
                            <tr> 
                                <td>
                                    <p><b><?php echo $i++ ; ?> ) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p>
                                    <div class="col-md-4 float-left">
                                      <div class="form-group pl-5 "> 
                                        <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_1']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                                        <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                            <?php echo $selQuestRow1['CHOICE_1']; ?>
                                        </label>
                                    </div>  

                                    <div class="form-group pl-5">
                                        <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_2']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                                        <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                            <?php echo $selQuestRow1['CHOICE_2']; ?>
                                        </label>
                                    </div>   
                                </div>
                                <div class="col-md-8 float-left">
                                   <div class="form-group pl-5">
                                    <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_3']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required>

                                    <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                        <?php echo $selQuestRow1['CHOICE_3']; ?>
                                    </label>
                                </div>  

                                <div class="form-group pl-5">
                                    <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_4']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required>

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
                        <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" class="form-check-input" type="text" value="" id="invalidCheck" required>
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
                <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" class="form-check-input" type="radio" value="T" id="invalidCheck" required>TRUE &emsp;&emsp;
                <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" class="form-check-input" type="radio" value="F" id="invalidCheck" required>FALSE
                <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                </label>
            </div> 

        </td>
    </tr>
</div>
<?php } } } ?>
</div>
</tbody>
</table>
</table>
</div>
<div style="display: none;" class="section section4">
    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
     <table class="align-left mb-0 table table-borderless table-striped table-hover" id="tableList">
        <thead>
            <th>Section 4</th>
        </thead>
        <tbody>
          <?php 
          $M1L1=$selQ['M1L1'];
          $M1L2=$selQ['M1L2'];
          $M1L3=$selQ['M1L3'];
          $M1L4=$selQ['M1L4'];
          $M1L5=$selQ['M1L5'];
          ?>
           <?php $questId = $selQ['PID'];  
          $i = 1;  
          $usedQuest = [1=>[]];
          $diff_level = 1;
          for($r=1;$r<=$selQ['MARK5'];$r++) {
            while ($diff_level < 6 && count($usedQuest[$diff_level]) == $selQ['M5L'.$diff_level]) {
                $diff_level++;
                if (empty($usedQuest[$diff_level])) {
                    $usedQuest[$diff_level] = [];
                }
            }

            $cou_id=$selQ['cou_id']; 
            $selQuest1 = $conn->query("SELECT DISTINCT(QUEST_ID),MARKS,QUESTION_DESC,QID,CHOICE_1,CHOICE_2,CHOICE_3,CHOICE_4 FROM questionanswers WHERE MARKS=5 AND cou_id=$cou_id AND DIFFICULTY=$diff_level AND QUEST_ID not in ('".implode("', '", $usedQuest[$diff_level])."') ORDER BY rand()");

               if($selQuest1->rowCount() > 0) {
                  $selQuestRow1 = $selQuest1->fetch(PDO::FETCH_ASSOC);
                  $usedQuest[$diff_level][] = $selQuestRow1['QUEST_ID'];
                  if($selQuestRow1['QID'] == 1) { 
                         ?>
                         <div>
                            <tr> 
                                <td>
                                    <p><b><?php echo $i++ ; ?> ) <?php echo $selQuestRow1['QUESTION_DESC']; ?></b></p>
                                    <div class="col-md-4 float-left">
                                      <div class="form-group pl-5 "> 
                                        <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_1']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                                        <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                            <?php echo $selQuestRow1['CHOICE_1']; ?>
                                        </label>
                                    </div>  

                                    <div class="form-group pl-5">
                                        <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_2']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >

                                        <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                            <?php echo $selQuestRow1['CHOICE_2']; ?>
                                        </label>
                                    </div>   
                                </div>
                                <div class="col-md-8 float-left">
                                   <div class="form-group pl-5">
                                    <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_3']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required>

                                    <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                                        <?php echo $selQuestRow1['CHOICE_3']; ?>
                                    </label>
                                </div>  

                                <div class="form-group pl-5">
                                    <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" value="<?php echo $selQuestRow1['CHOICE_4']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required>

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
                        <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" class="form-check-input" type="text" value="" id="invalidCheck" required>
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
                <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" class="form-check-input" type="radio" value="T" id="invalidCheck" required>TRUE &emsp;&emsp;
                <input name="answer[<?php echo $selQuestRow1['QUEST_ID']; ?>][correct]" class="form-check-input" type="radio" value="F" id="invalidCheck" required>FALSE
                <label class="form-check-label" for="<?php echo $selQuestRow1['QUEST_ID']; ?>">
                </label>
            </div> 

        </td>
    </tr>
</div>
<?php } } } ?>
</div>
</tbody>
</table>
</table>
</div>
 <tr>
         <td style="padding: 20px;">
                                 <button type="button" class="btn btn-xlg btn-warning p-3 pl-4 pr-4" >Reset</button>
                                 <button  class="btn btn-xlg btn-primary p-3 pl-4 pr-4 float-right">Submit</button>
                             </td>
                         </tr>
</form>

<?php include("includes/footer.php"); ?>
