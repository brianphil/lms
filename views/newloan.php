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
                <td>New Loan</td>
            </tr>
        </table>
    </div>
    <div class="row" style="margin: 1%;">
        <div class="col-sm-12" style="margin-bottom: 5px;">
            <a href="loans"><button class="btn-secondary" style="width: 20%;">Back</button></a>
        </div>
        <div class="row">
            <div class="col-sm-12" style="margin-left: auto; margin-right: auto; width: auto;">
                <h5 style="color: #282;">Create new loan</h5>
                <form class="form-control" style="margin: 10%" method="post">
                    <label style="color: #228;" class="form-label">Search customer <span style="color: red">*</span></label>
                    <input class="form-control" type="text" name="search" placeholder="Search name/ID/phone no." />
                    <input type="hidden" name="customerId" value="">
                    <label style="color: #228;" class="form-label">Loan amount (Ksh) <span style="color: red">*</span></label>
                    <input id="amount" class="form-control" type="text" name="amount" placeholder="5000" />
                    <label style="color: #228;" class="form-label">Term (in weeks) <span style="color: red">*</span></label>
                    <input id="term" class="form-control" type="text" name="term" placeholder="4" />
                    <label style="color: #228;" class="form-label">Repayment start date <span style="color: red">*</span></label>
                    <input class="form-control" type="date" name="repaymentStartDate" /><br>
                    <button type="button" onclick="calculateRate(); return false;" id="calculate" name="calculate" style="width: 50%;" class="btn-success">Calculate</button><br><br>
                    <label style="color: #228;" class="form-label">Amount to repay (Ksh)</label>
                    <input id="amount-to-pay" class="form-control" type="text" name="paymentAmount" placeholder="0.00" disabled />
                    <p>
                        <input id="submit" class="form-control btn-primary" type="submit" value="Submit" name="submit" style="margin-top: 10px; width: 100%;" disabled />
                    </p>

                </form>
            </div>

        </div>

    </div>
    <script>
        function calculateRate() {
            if (document.getElementById("amount").value > 0 && document.getElementById("term").value > 0) {
                var y = document.getElementById("submit").disabled = false;
                var total = document.getElementById("amount").value * Math.pow((1 + 0.0678), document.getElementById("term").value)
                var amount = document.getElementById("amount-to-pay").value = Math.floor(total);
            } else {
                alert("Please enter the loan amount and the term");
            }
        }

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