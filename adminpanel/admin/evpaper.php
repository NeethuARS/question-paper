<?php 
session_start();

if(!isset($_SESSION['admin']['adminnakalogin']) == true) header("location:index.php");
    if(isset($_POST['submit'])){
       $exid = $_POST['stu'];

     }
 ?>
<?php include("../../conn.php"); 
?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>
<head>
  <style>
    .layout-container {
  display: grid;
  grid-template-columns: auto 25%;
  /*grid-template-columns: auto 300px;*/
  grid-column-gap: 30px;
  display: flex;
     width:100%;
}
main {
  flex: 3;
    width:75%;
  float:left;
}
aside {
  flex: 1;
    width:25%;
  float:left;
}
.layout-container:after {
   clear:both;
}
  </style>

</head>
<body>
  <div class="layout-container">
    <main>
    
<?php 
 $selQ = $conn->query("SELECT * FROM takenpaper INNER JOIN examinee_tbl ON takenpaper.exmne_id = examinee_tbl.exmne_id WHERE takenpaper.exmne_id = '$exid'")->fetch(PDO::FETCH_ASSOC);
 ?>
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div> Evaluate <?php echo $selQ['exmne_fullname']; ?>
                        </div>
                    </div>
                </div>
            </div>        
            <div class="col-md-12">
            <div id="refreshData">
            <div class="row">
                  <div class="col-md-12">
                      <div class="main-card mb-3 card">
                          <div class="card-header">
                            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Questions to Evaluate
                          </div>
                          <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                              <tr>
                                <th>Sl. No</th>
                                <th>Marks</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Evaluate</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                              <?php 
                                $selQue = $conn->query("SELECT * FROM questionanswers INNER JOIN takenpaper ON questionanswers.QUEST_ID = takenpaper.quest_id WHERE questionanswers.QID = 2");
                                     if($selQue->rowCount() > 0)
                                {
                                $i = 1;?>
                                <form action="evpaperconn.php" method="post"><?php 
                                while ($selQueRow = $selQue->fetch(PDO::FETCH_ASSOC)) { 
                                  $queId = $selQueRow['QUEST_ID']; ?>
                                  <tr>
                                    <td><input type='hidden' name='recordId' value='$queId' />
                                     <?php echo $i++ ; ?>
                                   </td>
                                   <td>
                                             <?php echo $selQueRow['MARKS']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['QUESTION_DESC']; ?>
                                           </td>
                                           <td>
                                              <?php $asn = $selQueRow['ans'];
                                              echo  $asn; ?>
                                           </td>
                                           <td>
                                             <input name="correct[<?php echo $queId; ?>]" class="form-check-input" type="radio" value="1" id=correct required /><i class="pe-7s-check">&emsp;&emsp;&emsp;
                                             <input name="correct[<?php echo $queId; ?>]" class="form-check-input" type="radio" value="0" id=incorrect required /><i class="pe-7s-close-circle">&emsp;&emsp;
                                            </td>
                                        </tr>

                            </tbody>
                        </table><?php } }else{echo "<script>alert('This student has not attempted a paper yet');
      window.location.href='checkp.php';</script>"; }
                         ?>
                         
        <button type="submit" name=evaluate class="btn btn-primary">Evaluate</button>

      </div>
           </div>
       
    </main>
    <aside>
      <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                   
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                       </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                               <li class="app-sidebar__heading">Correct Answers</li>
                                <li>
                                  <?php 
                                $Score = $conn->query("SELECT * FROM questionanswers INNER JOIN takenpaper ON questionanswers.QUEST_ID = takenpaper.quest_id AND questionanswers.ANSWERS = takenpaper.ans WHERE takenpaper.exmne_id='$exid'");
                                if($Score->rowCount() > 0)
                                {
                                $i = 1;
                                while ($ScoreRow = $Score->fetch(PDO::FETCH_ASSOC)) { ?>
                                <?php $queId = $ScoreRow['QUEST_ID']; ?>
                                        <p><input type='hidden' name='recordId' value='$queId' /><b><?php echo $i++; ?> ) <?php echo $ScoreRow['QUESTION_DESC']; ?> <input name="correct[<?php echo $queId; ?>]" class="form-check-input" type="hidden" value="1" id=correct required />
                                         <?php }?> <?php } elseif($Score->rowCount() == 0){
                                  echo "No Other Correct Answers"; 
                                }?>
                                  </li>      
                                  </form>              
    </aside>
  </div>
</body>
  <?php include("includes/footer.php"); ?>