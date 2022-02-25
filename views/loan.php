<?php
include "partials/header.php";
?>

<body>

  <div class="topnav header" id="myTopnav">
    <a href="home">Home</a>
    <a href="customers">Customers</a>
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
    <table>
      <tr>
        <td>Home</td>
        <td>/</td>
        <td>Loans</td>
      </tr>
    </table>
  </div>
  <?php
  $db = new Database();
  $lquey = "SELECT * FROM loans WHERE delete_flag='0'";
  ?>
  <div class="row" style="margin: 1%;">
    <div class="col-sm-12" style="margin-bottom: 5px;">
      <a style="text-decoration: none;" href="newloan"><button class="btn-secondary form-control" style="width: 20%;">Create New</button></a>
    </div>
    <div class="row">
      <div class="col-sm-12" style="margin-bottom: 50px">
        <table id="loans" class="dispalay">
          <thead>
            <tr>
              <th>Name</th>
              <th>Amount Apllied</th>
              <th>Balance</th>
              <th>Repayment Amount</th>
              <th>Date Applied</th>
              <th>Last Payment Date</th>
              <th>Payment Start Date</th>
              <th>Created By</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result = $db->mysqli->query($lquey);
            if ($result->num_rows > 0) {
              while ($res = mysqli_fetch_assoc($result)) {
                $cid = $res["customer_id"];
                $c_query = "SELECT fname, mname, lname, id FROM customers WHERE id='$cid'";
                $d_res = $db->mysqli->query($c_query);
                if ($d_res->num_rows > 0) {
                  $customer = mysqli_fetch_assoc($d_res);
                  $name = $customer["fname"] . " " . $customer["mname"] . " " . $customer["lname"];
                }

                $ammount_applied = $res["amount_applied"];
                $balance = $res["loan_balance"];
                $repayment_amount = $res["repayment_amount"];
                $date_applied = $res["date_created"];
                $last_payment = $res["last_payment_date"];
                $created_by = $res["added_by"];
                $payment_start = $res["repayment_start_date"];
                if ($last_payment == NULL) {
                  $last_payment = 'Pending';
                }
                if ($created_by == 1) {
                  $created_by = "Branch Manager";
                }

                echo '<tr>';
                echo '<td>' . $name . '</td>';
                echo '<td>' . $ammount_applied . '</td>';
                echo '<td>' . $balance . '</td>';
                echo '<td>' . $repayment_amount . '</td>';
                echo '<td>' . $date_applied . '</td>';
                echo '<td>' . $last_payment . '</td>';
                echo '<td>' . $payment_start . '</td>';
                echo '<td>' . $created_by . '</td>';
                echo '</tr>';
              }
            }
            ?>
          </tbody>
        </table>
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

    $(document).ready(function() {
      $('#loans').DataTable({
        responsive: true,
        stateSave: true,
        "bDestroy": true
      });
    });
  </script>


</body>

<?php
include "partials/footer.php";
?>