<?php
include "partials/header.php";
?>

<body>
<div class="header">
<div class="topnav" id="myTopnav">
  <a href="home">Home</a>
  <a href="customers" >Customers</a>
  <a href="loans" >Loans</a>
  <a href="payments">Payments</a>
  <a href="missedpayments">Missed Payments</a>
  <a href="reports">Reports</a>
  <a href="hrmodule">HR Module</a>
  <a href="branchmanager" class="active">Branch Manager</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
</div>
<div style="margin-top:4%; padding-left:16px; background: #eee">
<table><tr><td>Home</td><td>/</td><td>Brach Manager</td></tr></table>
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