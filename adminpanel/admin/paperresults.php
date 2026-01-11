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
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>EXAMINEE RESULT</div>
                    </div>
                </div>
            </div>  
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Examinee Paper Result
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Paper Name</th>
                                <th>Scores</th>
                                <th>Ratings</th>
                                <!-- <th width="10%"></th> -->
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExmne = $conn->query("SELECT * FROM examinee_tbl et INNER JOIN paper_attempt ea ON et.exmne_id = ea.exmne_id ORDER BY ea.papat_id DESC ");
                                if($selExmne->rowCount() > 0)
                                {
                                    $selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC) ?>
                                        <tr>
                                           <td><?php echo $selExmneRow['exmne_fullname']; ?></td>
                                           <td>
                                             <?php 
                                                $eid = $selExmneRow['exmne_id'];
                                                $selExName = $conn->query("SELECT * FROM epaper et INNER JOIN paper_attempt ea ON et.PID=ea.PID WHERE  ea.exmne_id='$eid' ");
                                                 if($selExName->rowCount() > 0)
                                                   {
                                                    while($selExRow = $selExName->fetch(PDO::FETCH_ASSOC)) { 
                                                $exam_id = $selExRow['PID'];
                                                echo $selExRow['PNAME'];
                                              ?>
                                           </td>
                                           <td>
                                                    <?php 
                                                    $selScore = $conn->query("SELECT * FROM questionanswers INNER JOIN takenpaper ON questionanswers.QUEST_ID = takenpaper.quest_id WHERE takenpaper.exmne_id='$eid' AND takenpaper.corrected='1'");
                                                      ?><?php 
                                                      if($selScore->rowCount() > 0)
                                {
                                $total = 0;
                                while ($ScoreRow = $selScore->fetch(PDO::FETCH_ASSOC)) {
                                $marks = ($ScoreRow['MARKS']*$ScoreRow['corrected'])
                                 ?> <?php $total += $marks; } ?>
                                 <span>
                                <?php echo $total; ?>
                                <?php 
                                    $over  = $selExRow['TOTAL'];
                                 ?>
                            </span> / <?php echo $over; ?> 
                                           </td>
                                           <td>
                                              <?php 
                                                    $selScore = $conn->query("SELECT * FROM questionanswers INNER JOIN takenpaper ON questionanswers.QUEST_ID = takenpaper.quest_id WHERE takenpaper.exmne_id='$eid' AND takenpaper.corrected=1");
                                                ?>
                                                <span>
                                                    <?php 
                                    $ans = $total / $over * 100;
                                    echo number_format($ans,2);
                                    echo "%";  } 
                                                     ?>
                                                </span> 
                                           </td>
                                           <!-- <td>
                                               <a rel="facebox" href="facebox_modal/updateExaminee.php?id=<?php echo $selExmneRow['exmne_id']; ?>" class="btn btn-sm btn-primary">Print Result</a>

                                           </td> -->
                                        </tr>
                                    <?php } } }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No Course Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
