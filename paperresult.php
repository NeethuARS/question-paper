<!DOCTYPE html>
<html>
<?php 
session_start();

if(!isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:index.php");

 ?>
<?php include("conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>
<?php 
    $PID = $_POST['papid'];
    $selExam = $conn->query("SELECT * FROM epaper WHERE PID='$PID' ")->fetch(PDO::FETCH_ASSOC);
 ?>

<div class="app-main__outer">
<div class="app-main__inner">
    <div id="refreshData">
            
    <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <?php echo $selExam['PNAME']; ?>
                    </div>
                </div>
            </div>
        </div>  
        <div class="row col-md-12">
            <h1 class="text-primary">RESULTS</h1>
        </div>
<div class="col-md-8 float-left">
            <div class="col-md-6 float-left">
            <div class="card mb-3 widget-content bg-night-fade">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"><h5>Score</h5></div>
                        <div class="widget-subheading" style="color: transparent;">/</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <?php 
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
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <?php }else
        {
            echo "<script>alert('Your Paper has not been evaulated yet');
      window.location.href='home.php';</script>";
         }
            ?>

            <div class="col-md-6 float-left">
            <div class="card mb-3 widget-content bg-happy-green">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"><h5>Percentage</h5></div>
                        <div class="widget-subheading" style="color: transparent;">/</div>
                        </div>
                        <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <?php 
                                $selScore = $conn->query("SELECT * FROM questionanswers INNER JOIN takenpaper ON questionanswers.QUEST_ID = takenpaper.quest_id WHERE takenpaper.exmne_id='$exmneId' AND takenpaper.PID='$PID' AND takenpaper.corrected=1");
                            ?>
                            <span>
                                <?php 
                                    $ans = $total / $over * 100;
                                    echo number_format($ans,2);
                                    echo "%";
                                 ?>
  
                        </div>
                    </div>
                </div>                           </span>
            </div>
            </div>
        </div>
    </div>


    </div>
        <div class="row col-md-6 float-left">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Your Answers</h5>
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                    <?php 
                        $selQuest = $conn->query("SELECT * FROM questionanswers INNER JOIN takenpaper ON questionanswers.QUEST_ID = takenpaper.quest_id WHERE takenpaper.exmne_id='$exmneId' AND takenpaper.PID='$PID' AND takenpaper.exmne_id='$exmneId' ");
                        $i = 1;
                        while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td>
                                    <b><p><?php echo $i++; ?> .) <?php echo $selQuestRow['QUESTION_DESC']; ?></p></b>
                                    <label class="pl-4 text-success">
                                        Answer : 
                                        <?php 
                                            if($selQuestRow['ANSWERS'] != $selQuestRow['ans'])
                                            { ?>
                                                <span style="color:red"><?php echo $selQuestRow['ans']; ?></span>
                                            <?PHP }
                                            else
                                            { ?>
                                                <span class="text-success"><?php echo $selQuestRow['ANSWERS']; ?></span>
                                            <?php }
                                         ?>
                                    </label>
                                </td>
                            </tr>
                        <?php }
                     ?>
                     </table>
                </div>
            </div>
        </div>
        
