<?php 
session_start();

if(!isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:index.php");


 ?>
 <script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
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
$PID = $_GET['select'];
 $selQ = $conn->query("SELECT * FROM epaper INNER JOIN examinee_tbl ON epaper.cou_id = examinee_tbl.exmne_course")->fetch(PDO::FETCH_ASSOC);
    $selExamTimeLimit = $selQ['TIMEL'];
 ?>
<link rel="stylesheet" type="text/css" href="css/mycss.css">
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
                                          <button name="section1" onclick="sec1();">   <?php echo "SECTION 1" ?></button>
                                         </td><td>
                                           <button name="section2" onclick="sec2();">   <?php echo "SECTION 2" ?></button>
                                          </td>
                                         <td>
                                           <button name="section3" onclick="sec2();">  <?php echo "SECTION 3" ?></button>
                                         </td>
                                        <td>
                                           <button name="section4" onclick="sec2();"> <?php echo "SECTION 4" ?></button>
                                          <td>
                                           </td>
                                        </tr>
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </form>
                  <script>
                    function sec1() {

                    }
                  </script>
                    <?php 
                    (section1)) {
                    ?>
                       <div class="col-md-3 p-0 mb-4">
                       	<form method="post" action="">
            <input type="hidden" name="PID" id="PID" value="<?php echo $select ?>">
            <input type="hidden" name="examAction" id="examAction" >
        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
        	 <table class="align-left mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                                <th>Section 1</th>
                            </thead>
                            <tbody>
                            	<?php 
             $selQue = $conn->query("SELECT * FROM epaper INNER JOIN questionanswers ON epaper.PID = questionanswers.PID")->fetch(PDO::FETCH_ASSOC);
 ?>
                      <?php $questId = $selQue['QID'];  
                      $i = 1;
               for($r=0;$r<$selQue['MARK1'];$r++) {
               	 $selQuest = $conn->query("SELECT * FROM questionanswers WHERE PID='$PID' ORDER BY rand()");
            if($selQuest->rowCount() > 0) {
            	$selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC);
                      if($selQuestRow['QID'] == 1) { 
                       ?>
                       <div>
                    <tr>
                        <td>
                            <p><b><?php echo $i++ ; ?> ) <?php echo $selQuestRow['QUESTION_DESC']; ?></b></p>
                            <div class="col-md-10 float-left">
                              <div class="form-group pl-4 ">
                                <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['CHOICE_1']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $selQuestRow['CHOICE_1']; ?>
                                </label>
                              </div>  
                          </div>
                              <div class="col-md-8 float-left">
                              <div class="form-group pl-4">
                                <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['CHOICE_2']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $selQuestRow['CHOICE_2']; ?>
                                </label>
                              </div>   
                            </div>
                            <div class="col-md-8 float-left">
                             <div class="form-group pl-4">
                                <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['CHOICE_3']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $selQuestRow['CHOICE_3']; ?>
                                </label>
                              </div>  
                          </div>
                          <div class="col-md-8 float-left">
                              <div class="form-group pl-4">
                                <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['CHOICE_4']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $selQuestRow['CHOICE_4']; ?>
                                </label>
                              </div>   
                            </div>
                            </div>
                        </td>
                    </tr>
</div>
                <?php } else if($selQuestRow['QID']==2) {  ?>
                	<div>
                  <tr>
                        <td>
                            <p><b><?php echo $i++ ; ?> .) <?php echo $selQuestRow['QUESTION_DESC']; ?></b></p><br>
                              <div class="form-group pl-4 ">
                                <input name="answer[<?php echo $questId; ?>][correct]" class="form-check-input" type="text" value="" id="invalidCheck" required >
                              </div>  
                        </td>
                    </tr>
                </div>
                            <?php } else if($selQuestRow['QID']==3) { ?>
                            	<div>
                          	 <tr>
                        <td>
                            <p><b><?php echo $i++ ; ?> .) <?php echo $selQuestRow['QUESTION_DESC']; ?></b></p>
                              <div class="form-group pl-4">
                                <input name="answer[<?php echo $questId; ?>][correct]" class="form-check-input" type="radio" value="" id="invalidCheck" required >TRUE &emsp;&emsp;
                               <input name="answer[<?php echo $questId; ?>][correct]" class="form-check-input" type="radio" value="" id="invalidCheck" required >FALSE
                                <label class="form-check-label" for="invalidCheck">
                                </label>
                              </div> 

                        </td>
                    </tr>
                </div>
                  <?php } }  }  ?>
                <?php
            }?>
              </table>
                  </div>
                 <tr>
                             <td style="padding: 20px;">
                                 <button type="button" style="width: 30%;" class="btn btn-xlg btn-warning p-3 pl-4 pr-4" id="resetExamFrm">Reset</button>
                                 <input name="submit" style="width: 30%;" type="submit" value="Submit" class="btn btn-xlg btn-primary p-3 pl-4 pr-4 float-right" >
                             </td>
                         </tr>
<?php include("includes/footer.php"); ?>
