<?php
include "partials/header.php";
?>

<body>

<div class="topnav header" id="myTopnav">
  <a href="home">Home</a>
  <a href="customers" >Customers</a>
  <a href="loans" class="active">Loans</a>
  <a href="payments">Payments</a>
  <a href="missedpayments">Missed Payments</a>
  <a href="reports">Reports</a>
  <a href="hrmodule">HR Module</a>
  <a href="branchmanager">Branch Manager</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div style="margin-top:4%; padding-left:16px; background: #eee">
<table><tr><td>Home</td><td>/</td><td>Loans</td></tr></table>
</div>
<div class="row" style="margin: 1%;">
    <div class="col-sm-12" style="margin-bottom: 5px;">
        <a href="newloan"><button class="btn-secondary" style="width: 20%;">Create New</button></a>
    </div>
    <div class="row">
        <div class="col-sm-12">
           <?php require_once "datatable.php" ?>
        </div>

    </div>

</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>

<?php
include "partials/footer.php";
?>