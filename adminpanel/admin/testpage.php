<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
   
     <script>
      function multiply1() {
      num1 = document. getElementById("mark1"). value;
      a = (num1 * 1) ;
      document.getElementById('ttl1').value = a ;
    }
    function multiply2() {
      num2 = document. getElementById("mark2"). value;
      b = (num2 * 2) ;
      document.getElementById('ttl2').value = b ;
    }
    function multiply5() {
      num5 = document. getElementById("mark5"). value;
      c = (num5 * 5) ;
      document.getElementById('ttl5').value = c ;
    }
    function multiply7() {
      num7 = document. getElementById("mark7"). value;
      d = (num7 * 7) ;
      document.getElementById('ttl7').value = d ;
    }
    function multiply10() {
      num10 = document. getElementById("mark10"). value;
      e = (num10 * 10) ;
      document.getElementById('ttl10').value = e ;
    }
    function totall() {
    document.getElementById('total').value = (a+b+c+d+e) ;
  }
  </script>
   </head>

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

        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div> Add questions
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-md-16">
            <div id="refreshData">
            <div class="row">
                  <div class="col-md-10">
                      <div class="main-card mb-3 card">
                          <div class="card-header">
                            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Information
                          </div>
                          <div class="card-body">
                            <form action="testpageconn.php" method="post">
                              <div class="form-group">
                                <label>Unit ID</label>
                                <input type="hidden" name="UnitId">
                                <input type="" name="UnitId" class="form-control" required="">
                              </div>  
                              <div class="form-group">
                                <label>Unit Name</label>
                                <input type="" name="UnitName" class="form-control" required="">
                              </div>  

                               <div class="form-group">
                                <label>1 Mark Questions &emsp; &emsp; &emsp; Difficulty level: &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; Total:</label><br>
                                <input type="number" onclick="multiply1();" min="0" max="10" name="mark1" id="mark1" class="txtbx" method="post"> 
                                &emsp;&emsp;&emsp; &emsp; &emsp; &emsp;
                                <select class="dropdown" placeholder="L-1" name="m1l1" style="border-color: #27fe00;">
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option> 
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" style="border-color: #36ec00;" name="m1l2" >
                                  <option>L-2</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m1l3"style="border-color:#7a9c00;"name="examLimit" >
                                  <option>L-3</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m1l4"style="border-color:#bc4e00;"name="examLimit">
                                  <option>L-4</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option>
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option> 
                                </select>
                                <select class="dropdown" name="m1l5" style="border-color: #ff0000;" name="examLimit" >
                                  <option>L-5</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                   <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m1l6"style="border-color: #ff0000;" name="examLimit" >
                                  <option >L-6</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option>
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option> 
                                </select>
                                &emsp;&emsp;&emsp;&emsp;<input type="number" id="ttl1" min="0" readonly> 
                              </div>

                              <div class="form-group">
                                <label>2 Mark Questions &emsp; &emsp; &emsp; Difficulty level: &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Total:</label><br>
                                <input type="number" onclick="multiply2();" min="0" max="10" name="mark2" id="mark2" class="txtbx" method="post"> 
                                &emsp;&emsp;&emsp; &emsp; &emsp; &emsp;
                                <select class="dropdown" name="m2l1"style="border-color: #27fe00;" name="examLimit" >
                                  <option>L-1</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option>
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option> 
                                </select>
                                <select class="dropdown" name="m2l2"style="border-color: #36ec00;" name="examLimit" >
                                  <option>L-2</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m2l3"style="border-color:#7a9c00;"name="examLimit" >
                                  <option>L-3</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m2l4"style="border-color:#bc4e00;"name="examLimit">
                                  <option>L-4</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m2l5"style="border-color: #ff0000;" name="examLimit">
                                  <option>L-5</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m2l6"style="border-color: #ff0000;" name="examLimit" >
                                  <option >L-6</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option>
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option> 
                                </select>  
                                &emsp;&emsp;&emsp;&emsp;<input type="number" id="ttl2" min="0" readonly> 
                              </div>

                              <div class="form-group">
                                <label>5 Mark Questions &emsp; &emsp; &emsp; Difficulty level: &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; Total:</label><br>
                               <input type="number" onclick="multiply5();" min="0" max="10" name="mark5" id="mark5" class="txtbx" method="post"> 
                                &emsp;&emsp;&emsp; &emsp; &emsp; &emsp;
                                <select class="dropdown" name="m5l1"style="border-color: #27fe00;" name="examLimit">
                                  <option>L-1</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown"name="m5l2" style="border-color: #36ec00;" name="examLimit" >
                                  <option>L-2</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m5l3"style="border-color:#7a9c00;"name="examLimit" >
                                  <option>L-3</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m5l4"style="border-color:#bc4e00;"name="examLimit">
                                  <option>L-4</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m5l5"style="border-color: #ff0000;" name="examLimit" >
                                  <option>L-5</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m5l6"style="border-color: #ff0000;" name="examLimit" >
                                  <option >L-6</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                &emsp;&emsp;&emsp;&emsp;<input type="number" id="ttl5" min="0" readonly> 
                              </div>

                              <div class="form-group">
                                <label>7 Mark Questions &emsp; &emsp; &emsp; Difficulty level: &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; Total:</label><br>
                                <input type="number" onclick="multiply7();" min="0" max="10" name="mark7" id="mark7" class="txtbx" method="post"> 
                                &emsp;&emsp;&emsp; &emsp; &emsp; &emsp;
                                <select class="dropdown" name="m7l1"style="border-color: #27fe00;" name="examLimit" >
                                  <option>L-1</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown"name="m7l2" style="border-color: #36ec00;" name="examLimit" >
                                  <option>L-2</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown"name="m7l3" style="border-color:#7a9c00;"name="examLimit">
                                  <option>L-3</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown"name="m7l4" style="border-color:#bc4e00;"name="examLimit" >
                                  <option>L-4</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m7l5"style="border-color: #ff0000;" name="examLimit" >
                                  <option>L-5</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option>
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option> 
                                </select>
                                <select class="dropdown" name="m7l6"style="border-color: #ff0000;" name="examLimit">
                                  <option >L-6</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option>
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option> 
                                </select>
                                &emsp;&emsp;&emsp;&emsp;<input type="number" id="ttl7" min="0" readonly>
                              </div>
                              <div class="form-group">
                                <label>10 Mark Questions &emsp; &emsp; &emsp; Difficulty level: &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; Total:</label><br>
                                <input type="number" onclick="multiply10();" min="0" max="10" name="mark10" id="mark10" class="txtbx" method="post"> 
                                &emsp;&emsp;&emsp; &emsp; &emsp; &emsp;
                                <select class="dropdown" name="m10l1"style="border-color: #27fe00;" name="examLimit" >
                                  <option>L-1</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown"name="m10l2" style="border-color: #36ec00;" name="examLimit" >
                                  <option>L-2</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m10l3"style="border-color:#7a9c00;"name="examLimit" >
                                  <option>L-3</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m10l4"style="border-color:#bc4e00;"name="examLimit" >
                                  <option>L-4</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m10l5"style="border-color: #ff0000;" name="examLimit" >
                                  <option>L-5</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option> 
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option>
                                </select>
                                <select class="dropdown" name="m10l6"style="border-color: #ff0000;" name="examLimit" >
                                  <option >L-6</option>
                                  <option value="1">1 </option> 
                                  <option value="2">2 </option> 
                                  <option value="3">3 </option> 
                                  <option value="4">4 </option> 
                                  <option value="5">5 </option> 
                                  <option value="6">6 </option>
                                  <option value="7">7 </option> 
                                  <option value="8">8 </option> 
                                  <option value="9">9 </option>
                                  <option value="10">10 </option> 
                                </select>
                                &emsp;&emsp;&emsp;&emsp;<input type="number" id="ttl10" min="0" readonly> 
                              </div>
                              <br>
                              <div class="form-group">
                                <label>Total Marks</label>
                                <input type="number" id="total" placeholder="click here" onfocus="totall()" readonly class="form-control"> 
                              </div> 
                              <div>
                                <button name="submit" class="btn btn-primary">Submit</button>
                              </div>     
                          </div>
                      </div>
                  </div>
                </form>
              </section>
<?php include("includes/footer.php"); ?>
