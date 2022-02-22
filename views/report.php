<?php
include "partials/header.php";
?>

<body>

  <div class="topnav header" id="myTopnav">
    <a href="home">Home</a>
    <a href="customers">Customers</a>
    <a href="loans">Loans</a>
    <a href="payments">Payments</a>
    <a href="missedpayments">Missed Payments</a>
    <a href="reports" class="active">Reports</a>
    <a href="hrmodule">HR Module</a>
    <a href="branchmanager">Branch Manager</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>

  <div style="margin-top:4%; padding-left:16px; background: #eee">
    <table>
      <tr>
        <td>Home</td>
        <td>/</td>
        <td>Reports</td>
        <td>/</td>
        <td>Daily Summary</td>
      </tr>
    </table>
  </div>
  <div class="row" style="margin: 1%;">
    <h5>Daily Summary</h5>
    <div class="col-sm-12">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="reports">Daily Summary</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#"><span>Loans Due</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#"><span>Collected Loans</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#"><span>Disbursments</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#"><span>Customers</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#"><span>Customer Performance</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#"><span>Staff Performance</span></a>
        </li>
      </ul>
      <div class="row" style="margin: 1%;">
        <div class="col-sm-4">
          <!-- Reports data here -->
          <div class="card" style="padding: 20px;">
            <p>Total Expected Payments Today</p>
            <span>KSH</span>
            <h3 style="color:darkred">33,000</h3>
          </div>
        </div>
        <div class="col-sm-4">
          <!-- Reports data here -->
          <div class="card" style="padding: 20px;">
            <p>Total Amount Collected Today</p>
            <span>KSH</span>
            <h3 style="color: darkgreen;">23,000</h3>
          </div>
        </div>
        <div class="col-sm-4" >
          <!-- Reports data here -->
          <div class="card" style="padding: 20px;">
            <p>New Customers Today</p>
            <span>Total registered</span>
            <h3 style="color: darkblue;">2</h3>
          </div>
        </div>
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