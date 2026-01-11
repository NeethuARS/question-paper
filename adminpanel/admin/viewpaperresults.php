 <?php 
session_start();

if(!isset($_SESSION['admin']['adminnakalogin']) == true) header("location:index.php");

 ?>
<?php include("../../conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>
 <link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
             
            <?php 
    if(isset($_POST['submit'])){
       $PID = $_POST['pid'];
                   $selEx = $conn->query("SELECT * FROM epaper WHERE PID='$PID' ")->fetch(PDO::FETCH_ASSOC);
                   $exam_course = $selEx['course_id'];


                   $selExmne = $conn->query("SELECT * FROM examinee_tbl et  WHERE exmne_course='$exam_course'  ");


                   ?>
                   <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div><b class="text-primary">RANKING BY EXAM</b><br>
                                Exam Name : <?php echo $selEx['PNAME']; ?><br><br>
                               <span class="border" style="padding:10px;color:black;background-color: yellow;">Excellence</span>
                               <span class="border" style="padding:10px;color:white;background-color: green;">Very Good</span>
                               <span class="border" style="padding:10px;color:white;background-color: blue;">Good</span>
                               <span class="border" style="padding:10px;color:white;background-color: red;">Failed</span>
                               <span class="border" style="padding:10px;color:black;background-color: #E9ECEE;">Not Answering</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                          <tbody>
                            <thead>
                                <tr>
                                    <th width="25%">Examinee Fullname</th>
                                    <th>Score / Over</th>
                                    <th>Percentage</th>
                                </tr>
                            </thead>
                            <?php 
                                while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <?php 
                                            $exmneId = $selExmneRow['exmne_id'];
                                $selScore = $conn->query("SELECT * FROM questionanswers INNER JOIN takenpaper ON questionanswers.QUEST_ID = takenpaper.quest_id WHERE takenpaper.exmne_id='$exmneId' AND takenpaper.PID='$PID' AND takenpaper.corrected='1'");
                            if($selScore->rowCount() > 0)
                                {
                                $total = 0;
                                while ($ScoreRow = $selScore->fetch(PDO::FETCH_ASSOC)) {
                                $marks = ($ScoreRow['MARKS']*$ScoreRow['corrected'])
                                 ?> <?php $total += $marks; } ?>
                            <span>
                                <?php echo $total; ?>
                                <?php 
                                    $over  = $selExam['TOTAL'];
                                 ?>
                            </span> / <?php echo $over; ?> 
                                              @$score = $selScore->rowCount();
                                                @$ans = $total / $over * 100;

                                         ?>
                                       <tr style="<?php 
                                             if($selAttempt->rowCount() == 0)
                                             {
                                                echo "background-color: #E9ECEE;color:black";
                                             }
                                             else if($ans >= 90)
                                             {
                                                echo "background-color: yellow;";
                                             } 
                                             else if($ans >= 80){
                                                echo "background-color: green;color:white";
                                             }
                                             else if($ans >= 75){
                                                echo "background-color: blue;color:white";
                                             }
                                             else
                                             {
                                                echo "background-color: red;color:white";
                                             }
                                           
                                            
                                             ?>"
                                        >
                                        <td>

                                          <?php echo $selExmneRow['exmne_fullname']; ?></td>
                                        
                                        <td >
                                        <?php 
                                          if($selAttempt->rowCount() == 0)
                                          {
                                            echo "Not answer yet";
                                          }
                                          else if($selScore->rowCount() > 0)
                                          {
                                            echo $totScore =  $selScore->rowCount();
                                            echo " / ";
                                            echo $over;
                                          }
                                          else
                                          {
                                            echo $totScore =  $selScore->rowCount();
                                            echo " / ";
                                            echo $over;
                                          }

                                            
                                            

                                         ?>
                                        </td>
                                        <td>
                                          <?php 
                                                if($selAttempt->rowCount() == 0)
                                                {
                                                  echo "Not answer yet";
                                                }
                                                else
                                                {
                                                    echo number_format($ans,2); ?>%<?php
                                                }
                                           
                                          ?>
                                        </td>
                                    </tr>
                                <?php }
                             ?>                              
                          </tbody>
                        </table>
                    </div>
<?php } } ?>
                
            <?php include("includes/footer.php"); ?>
            
      
        
</div>
         


















