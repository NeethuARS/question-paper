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
<?php 
if(isset($_POST['submit'])){
  $select = $_POST['select'];
}
?>
<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                      <?php  $selQue = $conn->query("SELECT * FROM questionanswers INNER JOIN course_tbl ON questionanswers.cou_id = course_tbl.cou_id");
                                if($selQue->rowCount() > 0)
                                  while ($selQueRow = $selQue->fetch(PDO::FETCH_ASSOC)) {
                                    if($selQueRow['cou_id']==$select) { 
                                                         ?>
                        <div>VIEW QUESTIONS OF <?php echo $selQueRow['cou_name']; ?> </div>
                    </div>
                </div>
            </div>        
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Multiple Choice Questions
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                                <th>Marks</th>
                                <th>Level</th>
                                <th>Question</th>
                                <th>Option 1</th>
                                <th>Option 2</th>
                                <th>Option 3</th>
                                <th>Option 4</th>
                                <th>Answer</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selQue = $conn->query("SELECT * FROM questionanswers ORDER BY QUEST_ID ASC");
                                if($selQue->rowCount() > 0)
                                {
                                    while ($selQueRow = $selQue->fetch(PDO::FETCH_ASSOC)) { 
                                      if($selQueRow['QID']==1) { ?>
                                        <tr>
                                           <td>
                                             <?php echo $selQueRow['MARKS']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['DIFFICULTY']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['QUESTION_DESC']; ?>
                                           </td>
                                            <td>
                                              <?php echo $selQueRow['CHOICE_1']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['CHOICE_2']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['CHOICE_3']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['CHOICE_4']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['ANSWERS']; ?>
                                           </td>
                                        </tr>
                                     <?php } } }?>
                                  }
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Fill In The Blanks Questions
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Marks</th>
                                <th>Level</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <!-- <th width="10%"></th> -->
                            </tr>
                            </thead>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selQue = $conn->query("SELECT * FROM questionanswers ");
                                if($selQue->rowCount() > 0)
                                {
                                    while ($selQueRow = $selQue->fetch(PDO::FETCH_ASSOC)) { 
                                      if($selQueRow['QID']==2) { ?>
                                        <tr>
                                           <td>
                                             <?php echo $selQueRow['MARKS']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['DIFFICULTY']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['QUESTION_DESC']; ?>
                                           </td>
                                            <td>
                                              <?php echo $selQueRow['ANSWERS']; ?>
                                           </td>
                                        </tr>
                                     <?php } } }?>

                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">True Or False Questions
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Marks</th>
                                <th>Level</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <!-- <th width="10%"></th> -->
                            </tr>
                            </thead>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selQue = $conn->query("SELECT * FROM questionanswers ");
                                if($selQue->rowCount() > 0)
                                {
                                    while ($selQueRow = $selQue->fetch(PDO::FETCH_ASSOC)) { 
                                      if($selQueRow['QID']==3) { ?>
                                        <tr>
                                           <td>
                                             <?php echo $selQueRow['MARKS']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['DIFFICULTY']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['QUESTION_DESC']; ?>
                                           </td>
                                            <td>
                                              <?php echo $selQueRow['ANSWERS']; ?>
                                           </td>
                                        </tr>
                                     <?php } } }?>

                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
</div>
<?php } else { 
                   echo "<script>alert('No Questions Found');
          window.location.href='mqpage.php';</script>";
                 }} 
               ?>
<?php include("includes/footer.php"); ?>
         
